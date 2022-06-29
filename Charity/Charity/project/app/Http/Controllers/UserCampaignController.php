<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Category;
use App\Country;
use App\Settings;
use App\UserProfile;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserCampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:profile');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::where('createdby',Auth::user()->id)->orderBy('id','desc')->get();
        return view('user.campaignlist',compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('user.campaignadd',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Campaign;

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'photo' => 'mimes:jpeg,bmp,png',
            'goal' => 'numeric|required',
        ]);

        if ($validator->fails()) {
            return redirect('user/campaign/create')
                ->withErrors($validator)
                ->withInput();
        }else{

            $data->fill($request->all());

            if ($file = $request->file('photo')){
                $photo_name = time().$request->file('photo')->getClientOriginalName();
                $file->move('assets/images/campaign',$photo_name);
                $data['feature_image'] = $photo_name;
            }
            $data['createdby'] = Auth::user()->id;
            $data->save();

            return redirect('user/campaign')->with('message','New Campaign Created Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campaign = Campaign::findOrFail($id);
        if ($campaign->createdby->id == Auth::user()->id){
            return view('user.campaigndetails',compact('campaign'));
        }else{
            return redirect('user/campaign')->with('error','Sorry, This Campaign is not created by you.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $campaign = Campaign::findOrFail($id);

        if ($campaign->createdby->id == Auth::user()->id){
            return view('user.campaignedit',compact('campaign','categories'));
        }else{
            return redirect('user/campaign')->with('error','Sorry, This Campaign is not created by you.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'photo' => 'mimes:jpeg,bmp,png',
            'goal' => 'numeric|required',
        ]);

        if ($validator->fails()) {
            return redirect('user/campaign/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }else {
	    $campaign = Campaign::findOrFail($id);
	    $data = $request->all();
	    if ($file = $request->file('photo')) {
	        $photo_name = time() . $request->file('photo')->getClientOriginalName();
	        $file->move('assets/images/campaign', $photo_name);
	        $data['feature_image'] = $photo_name;
	}
	
	if($campaign->status == "reject"){
		$data['status'] = "pending";
	}
	
            $campaign->update($data);

            return redirect('user/campaign')->with('message', 'Campaign Updated Successfully.');;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);

        if ($campaign->createdby == Auth::user()->id){
            unlink('assets/images/campaign/'.$campaign->feature_image);
            $campaign->delete();
            return redirect('user/campaign')->with('message','Campaign Deleted Successfully.');
        }else{
            return redirect('user/campaign')->with('error','Sorry, This Campaign is not created by you.');
        }
    }


    public function close($id)
    {
        $campaign = Campaign::findOrFail($id);
        $data['status'] = "closed";
        $campaign->update($data);

        return redirect('user/campaign')->with('message','Campaign Closed Successfully.');
    }

    public function open($id)
    {
        $campaign = Campaign::findOrFail($id);
        if ($campaign->admin_aproved=="yes"){
            $data['status'] = "running";
        }else{
            $data['status'] = "pending";
        }
        $campaign->update($data);

        return redirect('user/campaign')->with('message','Campaign Opened Successfully.');
    }

    public function withdraw($id)
    {
        $campaign = Campaign::findOrFail($id);
        $countries = Country::all();
        return view('user.withdrawfund',compact('campaign','countries'));
    }

    public function withdraws(Request $request,$id)
    {
        $from = UserProfile::findOrFail(Auth::user()->id);

        $campaign = Campaign::findOrFail($id);
        
        if ($campaign->createdby->id == Auth::user()->id){

        $withdrawcharge = Settings::findOrFail(1);
        $wcharge = $withdrawcharge->withdraw_charge;

        if($request->amount > 0){

            $charge = ($wcharge / 100) * $request->amount;
            $charge = number_format((float)$charge,2,'.','');

            $amount = $request->amount - $charge;
            $amount = number_format((float)$amount,2,'.','');

            if ($campaign->available_fund >= $request->amount){

                $balance1['available_fund'] = $campaign->available_fund - $request->amount;
                $campaign->update($balance1);

                $newwithdraw = new Withdraw();
                $newwithdraw['campid'] = $id;
                $newwithdraw['method'] = $request->methods;
                $newwithdraw['acc_email'] = $request->acc_email;
//                $newwithdraw['acc_phone'] = $request->acc_phone;
                $newwithdraw['iban'] = $request->iban;
                $newwithdraw['country'] = $request->acc_country;
                $newwithdraw['acc_name'] = $request->acc_name;
                $newwithdraw['address'] = $request->address;
                $newwithdraw['swift'] = $request->swift;
//                $newwithdraw['reference'] = $request->reference;
                $newwithdraw['amount'] = $amount;
                $newwithdraw['fee'] = $charge;
                $newwithdraw->save();

                return redirect()->back()->with('message','Withdraw Request Sent Successfully.');

            }else{
                return redirect()->back()->with('error','Insufficient Balance.')->withInput();
            }
        }
        return redirect()->back()->with('error','Please enter a valid amount.')->withInput();
        }else{
            return redirect('user/campaign')->with('error','Sorry, This Campaign is not created by you.');
        }
    }

    public function delete($id)
    {
        Withdraw::where('campid',$id)->delete();
        Donation::where('campid',$id)->delete();
        $campaign = Campaign::findOrFail($id);
        if ($campaign->createdby->id == Auth::user()->id){

            unlink('assets/images/campaign/'.$campaign->feature_image);
            $campaign->delete();

            return redirect('user/campaign')->with('message','Campaign Deleted Successfully.');
        }else{
            return redirect('user/campaign')->with('error','Sorry, This Campaign is not created by you.');
        }
    }


}
