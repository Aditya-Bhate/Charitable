@extends('admin.includes.masterpage-admin')

@section('content')


    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Social Links area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Social Links</h2>
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
                                    <form method="POST" action="{!! action('SocialLinkController@update',['id' => $social->id]) !!}" class="form-horizontal">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="facebook">Facebook *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="facebook" value="{{$social->facebook}}" id="facebook" placeholder="http://facebook.com/" required>
                                            </div>
                                            <div class="col-sm-3">
                                                @if($social->f_status == "enable")
                                                    <label class="switch">
                                                        <input type="checkbox" name="f_status" value="enable" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" name="f_status" value="enable">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="google-Plus">Google Plus *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="g_plus" value="{{$social->g_plus}}" id="google-Plus" placeholder="http://google.com/" required>
                                            </div>
                                            <div class="col-sm-3">
                                                @if($social->g_status == "enable")
                                                    <label class="switch">
                                                        <input type="checkbox" name="g_status" value="enable" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" name="g_status" value="enable">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="twiter">Twiter *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="twiter" value="{{$social->twiter}}" id="twiter" placeholder="http://twitter.com/" required>
                                            </div>
                                            <div class="col-sm-3">
                                                @if($social->t_status == "enable")
                                                    <label class="switch">
                                                        <input type="checkbox" name="t_status" value="enable" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" name="t_status" value="enable">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="linkedin">Linkedin *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="linkedin" value="{{$social->linkedin}}" id="linkedin" placeholder="http://linkedin.com/" required>
                                            </div>
                                            <div class="col-sm-3">
                                                @if($social->link_status == "enable")
                                                    <label class="switch">
                                                        <input type="checkbox" name="link_status" value="enable" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" name="link_status" value="enable">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update social settings</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Social Links area -->


                </div>
            </div>
        </div>
    </div>


@stop

@section('footer')

@stop