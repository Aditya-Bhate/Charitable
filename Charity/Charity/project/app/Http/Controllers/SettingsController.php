<?php

namespace App\Http\Controllers;

use App\PageSettings;
use App\Settings;
use App\SiteLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role != "administrator"){
                return redirect('admin/dashboard')->with('error','Sorry, You are not an Administrator');
            }
            else{

                return $next($request);
            }
        });
    }


    public function index()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.settings', compact('setting'));
    }

    public function logoform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setlogo', compact('setting'));
    }

    public function faviconform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setfavicon', compact('setting'));
    }

    public function aboutform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setabout', compact('setting'));
    }

    public function paymentform()
    {
         $setting = Settings::findOrFail(1);
         return view('admin.setpaymentinfo', compact('setting'));
    }

    public function footerform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setfooter', compact('setting'));
    }

    public function contentsform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         $pagedata = PageSettings::findOrFail(1);
         return view('admin.setcontents', compact('setting','pagedata'));
    }

    public function backgroundform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setbackground', compact('setting'));
    }

    public function addressform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setaddress', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['title' => $request->title]);
        Session::flash('message', 'Title Updated Successfully.');
        return redirect('admin/settings');
    }

    //Theme Color
    public function themecolors()
    {
        $setting = DB::select('select * from settings where id=?',[1]);
        return view('admin.setcolor', compact('setting'));
    }

    //Theme Color Update
    public function themecolor(Request $request)
    {
        $color = Settings::findOrFail(1)->theme_color;

        $actual_path = str_replace('project','',base_path());
        //$style1 = $actual_path.'assets/css/genius1.css';
        $style2 = $actual_path.'assets/css/style.css';

        //$file1_contents = file_get_contents($style1);
        $file2_contents = file_get_contents($style2);
        //$file1_contents = str_replace($color,$request->color,$file1_contents);
        $file2_contents = str_replace($color,$request->color,$file2_contents);
        //file_put_contents($style1,$file1_contents);
        file_put_contents($style2,$file2_contents);

        DB::table('settings')
            ->where('id', 1)
            ->update(['theme_color' => $request->color]);

        Session::flash('message', 'Theme Color Updated Successfully.');
        return redirect('admin/theme-color');
    }

    public function title(Request $request)
    {
        $homesections = PageSettings::findOrFail(1);

        $input['slider_status'] = 1;
        $input['split_status'] = 1;
        $input['welcome_status'] = 1;
        $input['latest_status'] = 1;
        $input['featured_status'] = 1;
        $input['service_status'] = 1;
        $input['counter_status'] = 1;
        $input['portfolio_status'] = 1;
        $input['volunteer_status'] = 1;
        $input['blog_status'] = 1;
        $input['testimonial_status'] = 1;
        $input['partners_status'] = 1;
        $input['home_reg_status'] = 1;
        $input['w_b_status'] = 1;
        $input['welcome_title'] = $request->welcome_title;
        $input['welcome_link'] = $request->welcome_link;
        $input['welcome_description'] = $request->welcome_description;

        if ($request->slider_status != 1){
            $input['slider_status'] = 0;
        }
        if ($request->split_status != 1){
            $input['split_status'] = 0;
        }
        if ($request->welcome_status != 1){
            $input['welcome_status'] = 0;
        }
        if ($request->latest_status != 1){
            $input['latest_status'] = 0;
        }
        if ($request->featured_status != 1){
            $input['featured_status'] = 0;
        }
        if ($request->service_status != 1){
            $input['service_status'] = 0;
        }
        if ($request->counter_status != 1){
            $input['counter_status'] = 0;
        }
        if ($request->portfolio_status != 1){
            $input['portfolio_status'] = 0;
        }
        if ($request->volunteer_status != 1){
            $input['volunteer_status'] = 0;
        }
        if ($request->testimonial_status != 1){
            $input['testimonial_status'] = 0;
        }
        if ($request->blog_status != 1){
            $input['blog_status'] = 0;
        }
        if ($request->partners_status != 1){
            $input['partners_status'] = 0;
        }
        if ($request->home_reg_status != 1){
            $input['home_reg_status'] = 0;
        }
        if ($request->w_b_status != 1){
            $input['w_b_status'] = 0;
        }

        if ($file = $request->file('welcome_image')){
            $photo_name = str_random(3).$request->file('welcome_image')->getClientOriginalName();
            $file->move('assets/images',$photo_name);
            $input['welcome_image'] = $photo_name;
        }

        DB::table('settings')
            ->where('id', 1)
            ->update([
                'title' => $request->title,
                'currency_sign' => $request->currency_sign,
                'currency_code' => $request->currency_code
            ]);

        $homesections->update($input);

        Session::flash('message', 'Website Content Updated Successfully.');
        return redirect('admin/settings/contents');
    }

    public function payment(Request $request)
    {

        $input['paypal_donate'] = 1;
        $input['stripe_donate'] = 1;
        $input['anonym_donation'] = 1;

        if ($request->paypal_donate != 1){
            $input['paypal_donate'] = 0;
        }
        if ($request->stripe_donate != 1){
            $input['stripe_donate'] = 0;
        }
        if ($request->anonym_donation != 1){
            $input['anonym_donation'] = 0;
        }

        $input['paypal_business'] = $request->paypal;
        $input['stripe_key'] = $request->stripe_key;
        $input['stripe_secret'] = $request->stripe_secret;
        $input['withdraw_charge'] = $request->withdraw_charge;

        DB::table('settings')
            ->where('id', 1)
            ->update($input);

        Session::flash('message', 'Payment Informations Updated Successfully.');
        return redirect('admin/settings/payment');
    }

    public function about(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['about' => $request->about]);


        Session::flash('message', 'About Us Text Updated Successfully.');
        return redirect('admin/settings/info');
    }

    public function address(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['address' => $request->address,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email]);
        Session::flash('message', 'Address Updated Successfully.');
        return redirect('admin/settings/address');
    }

    public function footer(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['footer' => $request->footer]);
        Session::flash('message', 'Footer Updated Successfully.');
        return redirect('admin/settings/footer');
    }

    public function logo(Request $request)
    {
        //return $request->all();

        ///return redirect('admin/settings');
        $logo = $request->file('logo');
        $name = $logo->getClientOriginalName();
        $logo->move('assets/images/logo',$name);
        DB::table('settings')
            ->where('id', 1)
            ->update(['logo' => $name]);
        Session::flash('message', 'Website Logo Updated Successfully.');
        return redirect('admin/settings/logo');
    }

    public function favicon(Request $request)
    {
        $logo = $request->file('favicon');
        $name = $logo->getClientOriginalName();
        $logo->move('assets/images/',$name);
        DB::table('settings')
            ->where('id', 1)
            ->update(['favicon' => $name]);
        Session::flash('message', 'Website Favicon Updated Successfully.');
        return redirect('admin/settings/favicon');
    }

    public function background(Request $request)
    {

        $logo = $request->file('background');
        $name = $logo->getClientOriginalName();
        $logo->move('assets/images',$name);
        DB::table('settings')
            ->where('id', 1)
            ->update(['background' => $name]);
        Session::flash('message', 'Background Image Updated Successfully.');
        return redirect('admin/settings/background');
    }


    public function setlanguage()
    {
        $language = SiteLanguage::findOrFail(1);
        return view('admin.setlanguages',compact('language'));
    }

    public function language(Request $request)
    {
        $language = SiteLanguage::findOrFail(1);
        $data = $request->all();
        $language->update($data);
        return redirect('admin/language-settings')->with('message','Website Language Updated Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        //return $request->all();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
