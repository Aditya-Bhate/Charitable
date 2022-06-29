@extends('admin.includes.masterpage-admin')

@section('content')
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Website Logo -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Website Contents</h2>
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
                                    <form method="POST" action="title" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title">Website Title *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="title" value="{{$setting[0]->title}}" id="website_title" class="form-control" placeholder="Website Title" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title1">Currency Sign *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="currency_sign" value="{{$setting[0]->currency_sign}}" id="website_title1" class="form-control" placeholder="Currency Sign" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title2">Currency Code *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="currency_code" value="{{$setting[0]->currency_code}}" id="website_title2" class="form-control" placeholder="Currency Code" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title3">Welcome Title *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="welcome_title" value="{{$pagedata->welcome_title}}" id="website_title3" class="form-control" placeholder="Welcome Title" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title4">Welcome Text *</label>
                                            <div class="col-sm-8">
                                                <textarea id="website_title4" rows="6" class="form-control" placeholder="Welcome Text" name="welcome_description" style="resize: vertical;" required>{{$pagedata->welcome_description}}</textarea>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="current_logo">Current Welcome Image</label>
                                            <div class="col-sm-8">
                                                <img src="{{url('assets/images')}}/{{$pagedata->welcome_image}}" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title5">Welcome Section Image *</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="welcome_image" accept="image/*" id="website_title5">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="disable/enable_contact_page">Disable/Enable <br>Welcome Button *</label>
                                            <div class="col-sm-8">
                                                @if($pagedata->w_b_status == 1)
                                                    <label class="switch">
                                                        <input type="checkbox" name="w_b_status" value="1"  checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" name="w_b_status" value="1" >
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title7">Welcome Button Link *</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="welcome_link" value="{{$pagedata->welcome_link}}" id="website_title7" class="form-control" placeholder="Welcome Button Link" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="add-product-header">
                                                <h3 style="margin-bottom: 0">Home Page Contents</h3>
                                            </div>
                                            <hr/>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Slider Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->slider_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="slider_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="slider_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Split Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->split_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="split_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="split_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Welcome Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->welcome_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="welcome_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="welcome_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Service Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->service_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="service_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="service_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Latest Campaign Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->latest_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="latest_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="latest_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Featured Campaign Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->featured_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="featured_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="featured_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Counter Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->counter_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="counter_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="counter_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Portfolio Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->portfolio_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="portfolio_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="portfolio_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Testimonial Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->testimonial_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="testimonial_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="testimonial_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Blog Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->blog_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="blog_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="blog_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page">Disable/Enable Partners Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->partners_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="partners_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="partners_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="disable/enable_contact_page2">Disable/Enable Volunteer Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->volunteer_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" name="volunteer_status" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" name="volunteer_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="sss">Disable/Enable Home Registration Section *</label>
                                                    <div class="col-sm-3">
                                                        @if($pagedata->home_reg_status == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" id="sss" name="home_reg_status" value="1" checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" id="sss" name="home_reg_status" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update setting</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Website Logo -->

                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop