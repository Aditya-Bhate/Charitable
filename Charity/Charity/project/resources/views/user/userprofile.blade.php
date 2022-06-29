@extends('user.includes.masterpage-user')

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
                                        <h2>Profile</h2>
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
                                    <form method="POST" action="{!! action('UserProfileController@update',['id' => $user->id]) !!}" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="admin_name">Admin Name *</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="name" value="{{$user->name}}" id="admin_name" placeholder="Admin Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="admin_email_address">Email Address *</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="email" value="{{$user->email}}" id="admin_email_address" placeholder="Email Address" required disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="admin_phone_number">Phone Number *</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}" id="admin_phone_number" placeholder="Phone Number" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="user_country">Select Country *</label>
                                            <div class="col-sm-8">
                                                <select name="country" class="form-control selectpicker" id="user_country">
                                                    <option value=" " >Please select country</option>
                                                    @foreach($countries as $country)
                                                        @if($country->nicename == $user->country)
                                                            <option value="{{$country->nicename}}" selected>{{$country->nicename}}</option>
                                                        @else
                                                            <option value="{{$country->nicename}}">{{$country->nicename}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Update Profile</button>
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
<script>

</script>
@stop