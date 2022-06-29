@extends('includes.masterpage')

@section('content')

    <!-- Starting of Donate Details area -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="donate-area text-center">
                        @if($settings[0]->success_msg != "")
                            {!! $settings[0]->success_msg !!}
                        @else
                            <h1 class="text-center" style="color: green">Payment Success.<br> Thank You !!</h1>
                            <h2>Your Donation Received Successfully.</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Donate Details area -->

@stop

@section('footer')

@stop