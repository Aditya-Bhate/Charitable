@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Add New Category area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Add New Category</h2>
                                        <a href="{!! url('admin/category') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>

                                    <div id="response" class="col-md-12">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form method="POST" action="{!! action('CategoryController@store') !!}" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="category_display_name">Category Display Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="name" id="category_display_name" placeholder="Enter Category Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="category_slug">Category Slug* <span>(In English)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="slug" id="category_slug" placeholder="Enter Category Slug">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="setup_new_logo">Set Category Image * <span>All Category Image Should be Same sized</span></label>
                                            <div class="col-sm-8">
                                                <input type="file" name="image" id="setup_new_logo" accept="image/*" required>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Add Category</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Add New Category area -->

                </div>
            </div>
        </div>
    </div>


@stop

@section('footer')

@stop