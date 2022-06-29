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
                                        <h2>Payment Information's</h2>
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
                                    <form method="POST" action="payment" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="paypal_business_account">Paypal Business Account *</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="paypal" value="{{$setting->paypal_business}}" id="paypal_business_account" class="form-control" placeholder="Paypal Business Account">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="stripe_key">Stripe Key *</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="stripe_key" value="{{$setting->stripe_key}}" id="stripe_key" class="form-control" placeholder="Stripe key">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="stripe_secret_key">Stripe Secret Key *</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="stripe_secret" value="{{$setting->stripe_secret}}" id="stripe_secret_key" class="form-control" placeholder="Stripe Secret" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="withdraw_charge">Withdraw Charge(%) *</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="withdraw_charge" value="{{$setting->withdraw_charge}}" id="withdraw_charge" class="form-control" placeholder="Withdraw Charge" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="success_msg">Payment Success Message *</label>
                                            <div class="col-sm-7">
                                                <textarea name="success_msg" id="success_msg" class="form-control" style="resize: vertical;">{{$setting->success_msg}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="anonym_donation">Disable/Enable Anonymous Donation *</label>
                                            <div class="col-sm-7">
                                                @if($setting->anonym_donation == 1)
                                                    <label class="switch">
                                                        <input type="checkbox" id="anonym_donation" name="anonym_donation" value="1"  checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" id="anonym_donation" name="anonym_donation" value="1" >
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="add-product-header">
                                                <h3 style="margin-bottom: 0">Donate Options</h3>
                                            </div>
                                            <hr/>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="enable_paypal">Disable/Enable Paypal Deposit *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->paypal_donate == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" id="enable_paypal" name="paypal_donate" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" id="enable_paypal" name="paypal_donate" value="1" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-8" for="enable_stripe">Disable/Enable Stripe Deposit *</label>
                                                    <div class="col-sm-3">
                                                        @if($setting->stripe_donate == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" id="enable_stripe" name="stripe_donate" value="1"  checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" id="enable_stripe" name="stripe_donate" value="1" >
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
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true}).panelInstance('success_msg');
        });
    </script>
@stop