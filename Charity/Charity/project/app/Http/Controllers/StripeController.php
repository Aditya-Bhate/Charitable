<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Donation;
use Illuminate\Http\Request;
use URL;
use Redirect;
use Input;
use Validator;
use App\Order;
use App\Package;
use App\PricingTable;
use App\Settings;
use Config;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

class StripeController extends Controller
{

    public function __construct()
    {
        //Set Spripe Keys
        $stripe = Settings::findOrFail(1);
  		Config::set('services.stripe.key', $stripe->stripe_key);
  		Config::set('services.stripe.secret', $stripe->stripe_secret);
    }


    public function store(Request $request){

        $campaign = Campaign::findOrFail($request->campaign);

        $donation = new Donation();
		$success_url = action('PaymentController@payreturn');
		$item_name = $campaign->title." Donation";
     	$item_number = str_random(2).time();
		$item_amount = $request->amount;

		$validator = Validator::make($request->all(),[
						'card' => 'required',
						'cvv' => 'required',
						'month' => 'required',
						'year' => 'required',
					]);

		if ($validator->passes()) {

	     	$stripe = Stripe::make(Config::get('services.stripe.secret'));
	     	try{
	     		$token = $stripe->tokens()->create([
	     			'card' =>[
	     					'number' => $request->card,
	     					'exp_month' => $request->month,
	     					'exp_year' => $request->year,
	     					'cvc' => $request->cvv,
	     				],
	     			]);
	     		if (!isset($token['id'])) {
	     			return back()->with('error','Token Problem With Your Token.');
	     		}

	     		$charge = $stripe->charges()->create([
	     			'card' => $token['id'],
	     			'currency' => 'USD',
	     			'amount' => $item_amount,
	     			'description' => $item_name,
	     			]);

	     		//dd($charge);

	     		if ($charge['status'] == 'succeeded') {

                    $donation['campid'] = $request->campaign;
                    $donation['campby'] = $campaign->createdby->id;
                    $donation['donation_method'] = "Stripe";
                    $donation['amount'] = $item_amount;
                    $request->anonymous == "" ? $donation['anonymous'] = "no":$donation['anonymous'] = "yes";
                    $donation['donator_email'] = $request->email;
                    $donation['donator_name'] = $request->name;
                    $donation['donator_phone'] = $request->phone;
                    $donation['donate_date'] = date('Y-m-d H:i:s');
                    $donation['donator_address'] = $request->address;
                    $donation['donator_city'] = $request->city;
                    $donation['donator_zip'] = $request->zip;
                    $donation['donation_number'] = $item_number;
                    $donation['txn_id'] = $charge['balance_transaction'];
                    $donation['charge_id'] = $charge['id'];
                    $donation['status'] = "Completed";
                    $donation->save();

                    $data['available_fund'] = $campaign->available_fund + $item_amount;
                    $campaign->update($data);

	     			return redirect($success_url);
	     		}
	     		
	     	}catch (Exception $e){
	     		return back()->with('error', $e->getMessage());
	     	}catch (\Cartalyst\Stripe\Exception\CardErrorException $e){
	     		return back()->with('error', $e->getMessage());
	     	}catch (\Cartalyst\Stripe\Exception\MissingParameterException $e){
	     		return back()->with('error', $e->getMessage());
	     	}
		}
		return back()->with('error', 'Please Enter Valid Credit Card Informations.');
	}
}
