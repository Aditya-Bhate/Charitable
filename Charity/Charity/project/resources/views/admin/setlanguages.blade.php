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
                                        <h2>Website Languages</h2>
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
                                    <form method="POST" action="{!! action('SettingsController@language') !!}" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_title">Home * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="title" value="{{$language->home}}" id="website_title" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language1">About Us * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="about_us" value="{{$language->about_us}}" id="website_language1" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language2">Contact Us * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="contact_us" value="{{$language->contact_us}}" id="website_language2" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language3">FAQ * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="faq" value="{{$language->faq}}" id="website_language3" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language4">Log In * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="log_in" value="{{$language->log_in}}" id="website_language4" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language5">Sign Up * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="sign_up" value="{{$language->sign_up}}" id="website_language5" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language5d">My Account * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="my_account" value="{{$language->my_account}}" id="website_language5d" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language4r">Forgot Password * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="forgot_password" value="{{$language->forgot_password}}" id="website_language4r" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language59">Campaigns * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="campaigns" value="{{$language->campaigns}}" id="website_language59" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language55">Running Campaigns * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="running_campaigns" value="{{$language->running_campaigns}}" id="website_language55" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language56">Completed Campaigns * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="completed_campaigns" value="{{$language->completed_campaigns}}" id="website_language56" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language57">Donations * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="donations" value="{{$language->donations}}" id="website_language57" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language58">Funded * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="funded" value="{{$language->funded}}" id="website_language58" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language6">Campaign Details * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="campaign_details" value="{{$language->campaign_details}}" id="website_language6" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language6d">Donate * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="donate" value="{{$language->donate}}" id="website_language6d" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language7">Created By * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="created_by" value="{{$language->created_by}}" id="website_language7" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language8s">Goal
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="goal" value="{{$language->goal}}" id="website_language8s" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language8z">Days Left
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="days_left" value="{{$language->days_left}}" id="website_language8z" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language8z3">Enter Details
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="enter_details" value="{{$language->enter_details}}" id="website_language8z3" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language8z33">Donate Anonymous
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="donate_anonymous" value="{{$language->donate_anonymous}}" id="website_language8z33" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language8">Date
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="dates" value="{{$language->dates}}" id="website_language8" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language9">Action
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="action" value="{{$language->action}}" id="website_language9" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language10">Amount
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="amount" value="{{$language->amount}}" id="website_language10" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language13">Withdraw
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="withdraw" value="{{$language->withdraw}}" id="website_language13" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language15">Settings
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="settings" value="{{$language->settings}}" id="website_language15" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language16">Transactions
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="transactions" value="{{$language->transactions}}" id="website_language16" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language23">Total
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="total" value="{{$language->total}}" id="website_language23" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language24">Address
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="address" value="{{$language->address}}" id="website_language24" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language25">Contact Us Today
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="contact_us_today" value="{{$language->contact_us_today}}" id="website_language25" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language26">Phone
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="phone" value="{{$language->phone}}" id="website_language26" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language27">Email
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="email" value="{{$language->email}}" id="website_language27" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language28">Fax
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fax" value="{{$language->fax}}" id="website_language28" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language29">Submit
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="submit" value="{{$language->submit}}" id="website_language29" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language30">Name
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" value="{{$language->name}}" id="website_language30" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language31">Dashboard
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="dashboard" value="{{$language->dashboard}}" id="website_language31" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language32">Update Profile
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="update_profile" value="{{$language->update_profile}}" id="website_language32" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language33">Change Password
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="change_password" value="{{$language->change_password}}" id="website_language33" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language34">Latest Blogs
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="latest_blogs" value="{{$language->latest_blogs}}" id="website_language34" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language34">Recent Posts
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="recent_posts" value="{{$language->recent_posts}}" id="website_language34" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language35">Footer Links
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="footer_links" value="{{$language->footer_links}}" id="website_language35" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language36">View Details
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="view_details" value="{{$language->view_details}}" id="website_language36" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language37">Blog
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="blog" value="{{$language->blog}}" id="website_language37" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language38">Share In Social
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="share_in_social" value="{{$language->share_in_social}}" id="website_language38" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="website_language39">Logout
                                                * <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="logout" value="{{$language->logout}}" id="website_language39" class="form-control" placeholder="Your Language" required>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update Languages</button>
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