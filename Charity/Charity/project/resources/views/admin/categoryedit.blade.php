@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Edit Category area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Edit Category</h2>
                                        <a href="{!! url('admin/category') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <form method="POST" action="{!! action('CategoryController@update',['id' => $category->id]) !!}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="edit_category_display_name">Category Display Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="name" value="{{$category->name}}" id="edit_category_display_name" placeholder="Enter Category Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="edit_category_slug">Category Slug* <span>(In English)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="slug" value="{{$category->slug}}" id="edit_category_slug" placeholder="Enter Category Slug">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="current_logo">Current Background Image</label>
                                            <div class="col-sm-8">
                                                <img src="{{url('assets/images/category')}}/{{$category->image}}" alt="No Image Added">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="setup_new_logo">Setup New Background * <span>All Category Image Should be Same sized</span></label>
                                            <div class="col-sm-8">
                                                <input type="file" name="image" id="setup_new_logo" accept="image/*">
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Update Category</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Edit Category area -->

                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop