@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard add-product-1 area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Add Partners</h2>
                                    </div>
                                    <hr/>
                                    <div id="response" class="col-md-12">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                        @if(Session::has('error'))
                                            <div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ Session::get('error') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form method="POST" action="{!! action('PageSettingsController@brandstore') !!}" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="admin_current_photo">Add Partner Logos *<span>Multiple Image Allowed<br>(Hold CRTL and Select Images)</span></label>

                                            <div class="col-sm-5">
                                                <input name="brands[]" accept="image/*" type="file"  multiple required>
                                            </div>
                                        </div>

                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Add New Partners</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard add-product-1 area -->


                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop