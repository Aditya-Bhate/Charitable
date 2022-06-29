<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        $customers = UserProfile::orderBy('id','desc')->get();
        return view('admin.users',compact('customers'));
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
        $customer = UserProfile::findOrFail($id);
        return view('admin.userdetails',compact('customer'));
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

    public function email($id)
    {
        $customer = UserProfile::findOrFail($id);
        return view('admin.sendemail', compact('customer'));
    }

    public function sendemail(Request $request)
    {
        // mail($request->to,$request->subject,$request->message);
        return redirect('admin/users')->with('message','Email Send Successfully');
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
    }

    public function status($id,$status)
    {
        $customer = UserProfile::findOrFail($id);
        $data['status']=$status;
        $customer->update($data);
        return redirect('admin/users')->with('message','Customer Account Status Changed Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = UserProfile::findOrFail($id);
        $customer->delete();
        return redirect('admin/users')->with('message','Customer Delete Successfully.');
    }

}
