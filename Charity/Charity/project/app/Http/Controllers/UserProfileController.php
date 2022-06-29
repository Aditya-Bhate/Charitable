<?php

namespace App\Http\Controllers;

use App\Country;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserProfileController extends Controller
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
        $user = UserProfile::find(Auth::user()->id);
        return view('user.dashboard',compact('user'));
    }

    public function profile()
    {
        $user = UserProfile::find(Auth::user()->id);
        $countries = Country::all();
        return view('user.userprofile' , compact('user','countries'));
    }

    public function password()
    {
        $user = UserProfile::find(Auth::user()->id);
        return view('user.userchangepass' , compact('user'));
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
        //
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
        $user = UserProfile::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')){
            $photo = time().$request->file('photo')->getClientOriginalName();
            $file->move('assets/images/admin',$photo);
            $input['photo'] = $photo;
        }

        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){

                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('error', 'Confirm Password Doesnot match.');
                    return redirect('user/profile');
                }
            }else{
                Session::flash('error', 'Profile Updated Successfully.');
                return redirect('user/profile');
            }
        }
        //return $request->cpass;
        //return "Not..";
        $user->update($input);
        Session::flash('message', 'Profile Updated Successfully.');
        return redirect('user/profile');
    }

    public function changepass(Request $request, $id)
    {
        $user = UserProfile::findOrFail($id);
        $input['password'] = "";
        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){

                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('error', 'Confirm Password Does not match.');
                    return redirect('user/changepassword');
                }
            }else{
                Session::flash('error', 'Current Password Does not match');
                return redirect('user/password');
            }
        }

        $user->update($input);
        Session::flash('message', 'Account Password Updated Successfully.');
        return redirect('user/password');
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
