<?php

namespace App\Http\Controllers;

use App\SectionTitles;
use App\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
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
        $languages = SectionTitles::findOrFail(1);
        $volunteers = Volunteer::all();
        return view('admin.volunteers',compact('volunteers','languages'));
    }

    public function titlesform()
    {
        $languages = SectionTitles::findOrFail(1);
        return view('admin.volunteertitles',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.volunteeradd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = new Volunteer();
        $team->fill($request->all());

        if ($file = $request->file('photo')){
            $photo_name = str_random(3).$request->file('photo')->getClientOriginalName();
            $file->move('assets/images/volunteer',$photo_name);
            $team['photo'] = $photo_name;
        }
        $team->save();
        return redirect('admin/volunteer')->with('message','New Volunteer Added Successfully.');
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
        $volunteer = Volunteer::findOrFail($id);
        return view('admin.volunteeredit',compact('volunteer'));
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
        $team = Volunteer::findOrFail($id);
        $data = $request->all();

        if ($file = $request->file('photo')){
            $photo_name = str_random(3).$request->file('photo')->getClientOriginalName();
            $file->move('assets/images/volunteer',$photo_name);
            $data['photo'] = $photo_name;
        }
        $team->update($data);
        return redirect('admin/volunteer')->with('message','Volunteer Member Updated Successfully.');
    }

    public function titles(Request $request)
    {
        $team = SectionTitles::findOrFail(1);
        $data['volunteer_title'] = $request->volunteer_title;
        $data['volunteer_text'] = $request->volunteer_text;
        $team->update($data);
        return redirect('admin/volunteer/titles')->with('message','Volunteer Section Title & Text Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Volunteer::findOrFail($id);
        $team->delete();
        return redirect('admin/volunteer')->with('message','Volunteer Member Delete Successfully.');
    }
}
