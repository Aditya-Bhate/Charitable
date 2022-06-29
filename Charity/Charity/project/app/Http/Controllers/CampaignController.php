<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Category;
use App\Donation;
use App\SectionTitles;
use App\Settings;
use App\Subscribers;
use App\UserProfile;
use App\Country;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = SectionTitles::findOrFail(1);
        $campaigns = Campaign::orderBy('id','desc')->get();
        return view('admin.campaignlist',compact('campaigns','language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.campaignadd',compact('categories'));
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
        $data->fill($request->all());

        if ($file = $request->file('photo')){
            $photo_name = time().$request->file('photo')->getClientOriginalName();
            $file->move('assets/images/campaign',$photo_name);
            $data['feature_image'] = $photo_name;
        }
        $data['admin_aproved'] = 'yes';
        $data['featured'] = 0;

        if ($request->featured == 1){
            $data['featured'] = 1;
        }

        if ($request->send_newsletter == 1){
            $subs = Subscribers::all();
            foreach($subs as $sub){
                $settings = Settings::findOrFail(1);
                $to = $sub->email;
                $subject = "New Campaign Notification";
                $txt = "Hello Subscriber,\nA new Campaign ".$request->title." is created. Please check our website to see details. Your little donation will help us to successful our campaign\nThank you.";
                $headers = "From: ".$settings->title."<".$settings->email.">";
                // mail($to,$subject,$txt,$headers);
            }

        }

        $data->save();

        return redirect('admin/campaign')->with('message','New Campaign Created Successfully.');
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
        return view('admin.campaigndetails',compact('campaign'));
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
        return view('admin.campaignedit',compact('campaign','categories'));
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
        $campaign = Campaign::findOrFail($id);
        $data = $request->all();
        $data['featured'] = 0;

        if ($request->featured == 1){
            $data['featured'] = 1;
        }

        if ($file = $request->file('photo')){
            $photo_name = time().$request->file('photo')->getClientOriginalName();
            $file->move('assets/images/campaign',$photo_name);
            $data['feature_image'] = $photo_name;
        }
        $campaign->update($data);

        return redirect('admin/campaign')->with('message','Campaign Updated Successfully.');;
    }

    public function title()
    {
        $languages = SectionTitles::findOrFail(1);
        return view('admin.campaign-title',compact('languages'));
    }

    public function titles(Request $request)
    {
        $service = SectionTitles::findOrFail(1);
        $data['pricing_title'] = $request->pricing_title;
        $data['pricing_text'] = $request->pricing_text;
        $data['newcamp_title'] = $request->newcamp_title;
        $data['newcamp_text'] = $request->newcamp_text;
        $service->update($data);
        return redirect('admin/campaign/titles')->with('message','Campaign Section Title & Text Updated Successfully.');
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
        unlink('assets/images/campaign/'.$campaign->feature_image);
        $campaign->delete();

        return redirect('admin/campaign')->with('message','Campaign Deleted Successfully.');
    }


    public function pending()
    {
        $campaigns = Campaign::where('status','pending')
                ->where('admin_aproved','no')
                ->get();
        return view('admin.campaignpending',compact('campaigns'));
    }

    public function pendingview($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('admin.viewpending',compact('campaign'));
    }


    public function accept($id)
    {
        $campaign = Campaign::findOrFail($id);

        $message = "Your Submitted Campaign Has Been Accepted Successfully.";        

        $data['admin_aproved'] = "yes";
        $data['status'] = "running";
        $campaign->update($data);
        // mail($campaign->createdby->email,"Your Campaign Has Been Accepted",$message);

        return redirect('admin/campaign/pending')->with('message','Campaign Approved Successfully.');
    }

    public function reject($id)
    {
        $campaign = Campaign::findOrFail($id);

        $reason = Input::get('reason');
        $message = "Reason: ".$reason;        

        $data['admin_aproved'] = "no";
        $data['status'] = "reject";
        $campaign->update($data);
        // mail($campaign->createdby->email,"Your Campaign Has Been Rejected",$message);

        return redirect('admin/campaign/pending')->with('message','Campaign Rejected Successfully.');
    }

    public function hardreject($id)
    {
        $campaign = Campaign::findOrFail($id);

        $reason = Input::get('reason');
        $message = "Reason: ".$reason;        
        
        $campaign->delete();
        // mail($campaign->createdby->email,"Your Campaign Has Been Rejected",$message);

        return redirect('admin/campaign/pending')->with('message','Campaign Rejected & Deleted Successfully.');
    }


    public function close($id)
    {
        $campaign = Campaign::findOrFail($id);
        $data['status'] = "closed";
        $campaign->update($data);

        return redirect('admin/campaign')->with('message','Campaign Closed Successfully.');
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

        return redirect('admin/campaign')->with('message','Campaign Opened Successfully.');
    }

    public function withdraw($id)
    {
        $campaign = Campaign::findOrFail($id);
        $countries = Country::all();
        return view('admin.withdrawfund',compact('campaign','countries'));
    }

    public function withdraws(Request $request,$id)
    {
        $from = UserProfile::findOrFail(Auth::user()->id);

        $campaign = Campaign::findOrFail($id);

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
    }

    public function delete($id)
    {
        Withdraw::where('campid',$id)->delete();
        Donation::where('campid',$id)->delete();
        $campaign = Campaign::findOrFail($id);
        unlink('assets/images/campaign/'.$campaign->feature_image);
        $campaign->delete();

        return redirect('admin/campaign')->with('message','Campaign Deleted Successfully.');
    }
}
