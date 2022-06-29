<?php

namespace App\Http\Controllers;

use App\Category;
use App\SectionTitles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.categorylist',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoryadd');
    }

    public function titlesform()
    {
        $languages = SectionTitles::findOrFail(1);
        return view('admin.categorytitles',compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'slug' => 'required|max:255|unique:category',
        ]);

        if ($validator->passes()) {
            $category = new Category;
            $category->fill($request->all());

            if ($file = $request->file('image')){
                $photo_name = str_random(3).$request->file('image')->getClientOriginalName();
                $file->move('assets/images/category',$photo_name);
                $category['image'] = $photo_name;
            }

            $category->save();
            Session::flash('message', 'New Category Added Successfully.');
            return redirect('admin/category');
        }
        return redirect()->back()->with('message', 'Category Slug Must Be Unique.');
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
        $category = Category::findOrFail($id);
        return view('admin.categoryedit',compact('category'));
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
        $validator = Validator::make($request->all(),[
            'slug' => 'required|max:255|unique:category,slug,'.$id,
        ]);

        if ($validator->passes()) {
            $category = Category::findOrFail($id);
            $input = $request->all();

            if ($file = $request->file('image')){
                $photo_name = str_random(3).$request->file('image')->getClientOriginalName();
                $file->move('assets/images/category',$photo_name);
                $input['image'] = $photo_name;
            }

            $category->update($input);
            Session::flash('message', 'Category Updated Successfully.');
            return redirect('admin/category');
        }
        return redirect()->back()->with('message', 'Category Slug Must Be Unique.');
    }

    public function titles(Request $request)
    {
        $team = SectionTitles::findOrFail(1);
        $data['category_title'] = $request->category_title;
        $data['category_text'] = $request->category_text;
        $team->update($data);
        return redirect('admin/category/titles')->with('message','Category Section Title & Text Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('message', 'Category Deleted Successfully.');
        return redirect('admin/category');
    }
}
