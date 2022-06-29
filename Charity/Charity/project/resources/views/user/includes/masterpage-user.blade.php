<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="vitproject Admin Panel.">
    <meta name="author" content="vitproject">
    <link rel="icon" type="image/png" href="{{url('/')}}/assets/images/{{$settings[0]->favicon}}" />
    <title>{{$settings[0]->title}} - User Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/bootstrap-tags.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/bootstrap-coloroicker.css')}}" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ URL::asset('assets/css/admin-style.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/admin-responsive.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="dashboard-wrapper">
    <div class="left-side">
        <!-- Starting of Dashboard Sidebar menu area -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    {{--<h2>dashboard</h2>--}}
                </div>

                <div class="navbar-right">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </nav>

        <div class="dashboard-sidebar-area">
            <img src="{{url('/')}}/assets/images/images.jpg" alt="">
            <div class="sidebar-menu-body">
                <nav id="sidebar-menu">
                    <div class="sidebar-header">
                        <a href="{{url('/')}}"><img src="{{ URL::asset('assets/images/logo')}}/{{$settings[0]->logo}}" alt="Website logo"></a>
                    </div>
                    <ul class="list-unstyled profile">
                        <li class="active">
                            <div class="row">
                                {{--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">--}}
                                    {{--<img src="{{url('/')}}/assets/images/admin/{{Auth::user()->photo}}" alt="profile image">--}}
                                {{--</div>--}}
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">{{ Auth::user()->name }}
                                        @if(\App\Campaign::where('createdby',Auth::user()->id)->count() > 0)
                                            <span>Campaign Owner</span>
                                        @else
                                            <span>New Member</span>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <ul class="collapse list-unstyled profile-submenu" id="homeSubmenu">
                                <li><a href="{!! url('user/profile') !!}"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                                <li><a href="{!! url('user/password') !!}"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-fw fa-power-off"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="list-unstyled components">
                        <li>
                            <a href="{!! url('user/dashboard') !!}"><i class="fa fa-fw fa-home"></i>  Dashboard</a>
                        </li>
                        <li>
                            <a href="{!! url('user/campaign') !!}"><i class="fa fa-fw fa-bank"></i> Campaigns</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Ending of Dashboard Sidebar menu area -->
    </div>

    @yield('content')

</div>

<!-- /#wrapper -->
<script>
    var baseUrl = '{!! url('/') !!}';
</script>
<!-- jQuery -->
<script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-tags.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/responsive.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.canvasjs.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/plugin/nicEdit.js')}}"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/js-yaml/3.6.0/js-yaml.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/admin-main.js')}}"></script>

@yield('footer')
</body>
</html>

