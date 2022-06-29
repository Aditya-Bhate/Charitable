@extends('includes.masterpage')

@section('content')


    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12">
                    <div class="login-form">

                        <div class="login-title text-center">{{$language->forgot_password}}</div>

                        <form method="POST" action="{{ route('user.forgotpass.submit') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Type Email Address" required>
                                </div>
                            </div>

                            <div id="resp">
                                @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn login-btn" name="button">{{$language->submit}}</button>
                                <hr>
                                <p><a href="{{route('user.login')}}" class="col-md-12">Already Have Account? Login</a></p>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('footer')

@stop