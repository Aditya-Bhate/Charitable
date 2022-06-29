@extends('includes.masterpage')

@section('content')

    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12">
                    <div class="login-form">
                        <div class="login-icon"><i class="fa fa-user"></i></div>

                        <div class="section-borders">
                            <span></span>
                            <span class="black-border"></span>
                            <span></span>
                        </div>

                        <div class="login-title text-center">{{$language->log_in}}</div>

                        <form method="POST" action="{{ route('user.login.submit') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Type Email Address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-unlock-alt"></i>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Type Password" required>
                                </div>
                            </div>

                            <div id="resp">
                                @if ($errors->has('password'))

                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ $errors->first('email') }}
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
                                <button type="submit" class="btn login-btn" name="button">{{$language->log_in}}</button>

                                <p><a href="{{route('user.reg')}}" class="text-center">Create a New Account</a></p>

                                <p><a href="{{route('user.forgotpass')}}">Forgot Password?</a></p>

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