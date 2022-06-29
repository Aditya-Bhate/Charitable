@extends('includes.masterpage')
@section('content')

    <!-- Starting of Donate Details area -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-push-8 col-md-4 col-md-push-8 col-xs-12 col-xs-pull-0 col-sm-12 col-sm-pull-0">
                    <div class="donate-area text-center">
                        <h3>{{$language->campaign_details}}</h3>
                        <hr/>
                        <div class="donate-user-info">
                            <h4>{{$campaign->title}}</h4>
                            <p><strong>{{$language->goal}}:</strong> {{$settings[0]->currency_sign}}{{$campaign->goal}}</p>
                            <p><strong>{{$language->total}} {{$language->funded}}:</strong> {{$settings[0]->currency_sign}}{{\App\Donation::getFund($campaign->id)}}</p>
                        </div>
                        <hr/>
                        <p><strong>{{$language->donate}} {{$language->amount}}:</strong> {{$settings[0]->currency_sign}}{{ Session::get('amount') }}</p>
                    </div>
                </div>
                <div class="col-lg-8 col-lg-pull-4 col-md-8 col-md-pull-4 col-xs-12 col-xs-push-0 col-sm-12 col-sm-push-0">
                    <div class="campign-details-content">
                        <h3>{{$language->enter_details}}</h3>
                        <hr/>
                        <div class="col-md-12">
                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="donate-details-form">
                            <form action="" class="form-horizontal" method="post" id="payment_form">
                                {{csrf_field()}}
                                @if($settings[0]->anonym_donation == 1)
                                <div class="form-group">
                                    <label for="full_name2" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-8">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="anonymous" id="anonym" value="yes">{{$language->donate_anonymous}}</label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div id="details">
                                    <div class="form-group">
                                        <label for="full_name" class="col-sm-3 control-label">Full Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="name" id="full_name" placeholder="Full Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number" class="col-sm-3 control-label">Phone Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="phone" id="phone_number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="col-sm-3 control-label">City</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="postal_code" class="col-sm-3 control-label">Postal Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="zip" id="postal_code" placeholder="Postal Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="credit_card" class="col-sm-3 control-label">Payment Option</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" onChange="meThods(this)" name="credit_card" id="credit_card" required>
                                            <option value="" selected>Select Payment Option</option>
                                            @if($settings[0]->paypal_donate)
                                                <option value="Paypal">Paypal</option>
                                            @endif
                                            @if($settings[0]->stripe_donate)
                                                <option value="Stripe">Credit Card</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div id="stripes" style="display: none;">
                                    <div class="form-group">
                                        <label for="card_number" class="col-sm-3 control-label">Card Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="card" id="card_number" placeholder="Card Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cvv" class="col-sm-3 control-label">CVV</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="cvv" id="full_name" placeholder="cvv">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="expire_month" class="col-sm-3 control-label">Expire Month</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="month" id="expire_month" placeholder="Expire Month">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="expire_year" class="col-sm-3 control-label">Expire Year</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="year" id="expire_year" placeholder="Expire Year">
                                        </div>
                                    </div>
                                </div>
                                <div id="paypals">
                                    <input type="hidden" name="cmd" value="_xclick" />
                                    <input type="hidden" name="no_note" value="1" />
                                    <input type="hidden" name="lc" value="UK" />
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="amount" value="{{ Session::get('amount') }}" />
                                    <input type="hidden" name="campaign" value="{{$campaign->id}}" />
                                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default btn-success">{{$language->donate}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Donate Details area -->

@stop

@section('footer')
<script type="text/javascript">
   function meThods(val) { 
          var action1 = "{{route('payment.submit')}}";
          var action2 = "{{route('stripe.submit')}}";
          if (val.value == "Paypal") {
            $("#payment_form").attr("action", action1);
            $("#stripes").hide();
          }
          if (val.value == "Stripe") {
            $("#payment_form").attr("action", action2);
            $("#stripes").show();
          }
          if (val.value == "") {
            $("#payment_form").attr("action", "");
            $("#stripes").hide();
          }
    }

   $('#anonym').click(function() {
       if($(this).is(":checked")){
           $("#details").hide();
           $("#details").find('input').attr('required',false);
       }else{
           $("#details").show();
           $("#details").find('input[name="name"]').attr('required',true);
           $("#details").find('input[name="email"]').attr('required',true);
       }
   });
</script>
@stop