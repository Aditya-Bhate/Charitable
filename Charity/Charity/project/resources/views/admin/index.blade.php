<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="Simple Documentation for project NewsOcean.">
    <meta name="author" content="vitproject">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$settings[0]->title}} - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('assets/css/admin-style.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/admin-responsive.css')}}" rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
<section class="login-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="login-form">
                    <div class="login-icon"><i class="fa fa-user"></i></div>

                    <div class="section-borders">
                        <span></span>
                        <span class="black-border"></span>
                        <span></span>
                    </div>

                    <div class="login-title">Please Sign In</div>

                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Type Email Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-unlock-alt"></i>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Type Password">
                            </div>
                        </div>

                        @if ($errors->has('email'))
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ $errors->first('email') }}
                            </div>

                        @endif
                        @if ($errors->has('password'))
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <div class="form-group text-center">
                            <button type="submit" class="btn login-btn" name="button">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="login-footer text-center">
                    Powered By <a href="{{url('/')}}" target="_blank">{{$settings[0]->title}}</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
<script src="{{ URL::asset('assets/js/jquery.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/main.js')}}"></script>
</body>
</html>