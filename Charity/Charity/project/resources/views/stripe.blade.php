@extends('includes.master')

@section('content')

    <section class="go-section">
        <div class="row">
            <div class="container">
            <div class="col-md-offset-2 col-md-8">
            @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('error') }}
                    </div>
                @endif
                </div>
                <div class="col-md-12 text-center services">
                    <div class="col-md-offset-2 col-md-8 order-div">
                        <div class="col-md-8 order-left">
                            <h4>ENTER YOUR DETAILS</h4>
                            <form action="{{route('stripe.submit')}}" method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <input type="text" class="form-control" name="card" placeholder="Card" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cvv" placeholder="Cvv" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="month" placeholder="Month" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="year" placeholder="Year" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="amount" placeholder="Amount" required>
                                </div>

                                <button type="submit" class="genius-btn"> Pay Now</button>
                            </form>

                        </div>
                        <div class="col-md-4 order-right">
                            <h4>ORDER DETAILS</h4>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@stop

@section('footer')

@stop