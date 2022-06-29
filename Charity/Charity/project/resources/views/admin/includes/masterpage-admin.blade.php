<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="vitproject Admin Panel.">
    <meta name="author" content="vitproject">
    <link rel="icon" type="image/png" href="{{url('/')}}/assets/images/{{$settings[0]->favicon}}" />
    <title>{{$settings[0]->title}} - Admin Panel</title>

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
                        <img src="{{ URL::asset('assets/images/logo')}}/{{$settings[0]->logo}}" alt="Website logo">
                    </div>
                    <ul class="list-unstyled profile">
                        <li class="active">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <img src="{{url('/')}}/assets/images/admin/{{Auth::user()->photo}}" alt="profile image">
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">{{ Auth::user()->name }}<span>{{ ucfirst(Auth::user()->role) }}</span></a>

                                </div>
                            </div>
                            <ul class="collapse list-unstyled profile-submenu" id="homeSubmenu">
                                <li><a href="{!! url('admin/adminprofile') !!}"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                                <li><a href="{!! url('admin/adminpassword') !!}"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
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
                            <a href="{!! url('admin/dashboard') !!}"><i class="fa fa-star"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#campaignsSection" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-bank"></i>  Campaigns</a>
                            <ul class="collapse list-unstyled" id="campaignsSection">
                                <li><a href="{!! url('admin/campaign/create') !!}"><i class="fa fa-fw fa-plus-square"></i>Create Campaigns</a></li>                                                                                  
                                <li><a href="{!! url('admin/campaign') !!}"><i class="fa fa-fw fa-bank"></i>All Campaigns</a></li>
                                <li><a href="{!! url('admin/campaign/pending') !!}"><i class="fa fa-fw fa-bank"></i>Pending Campaigns</a></li>
                                <li><a href="{!! url('admin/campaign/titles') !!}"><i class="fa fa-fw fa-tag"></i>Campaign section title</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{!! url('admin/withdraws') !!}"><i class="fa fa-fw fa-usd"></i> Withdraws</a>
                        </li>
                        <li>
                            <a href="#categorySection" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-sitemap"></i>  Category</a>
                            <ul class="collapse list-unstyled" id="categorySection">
                                <li><a href="{!! url('admin/category/create') !!}"><i class="fa fa-fw fa-plus-square"></i>Create Category</a></li>
                                <li><a href="{!! url('admin/category') !!}"><i class="fa fa-fw fa-sitemap"></i>All Category</a></li>
                                <li><a href="{!! url('admin/category/titles') !!}"><i class="fa fa-fw fa-file-text"></i>Category Section Titles</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{!! url('admin/users') !!}"><i class="fa fa-fw fa-user"></i> Manage Users</a>
                        </li>
                        @if(Auth::user()->role == "administrator")
                            <li>
                                <a href="{!! url('admin/staffs') !!}"><i class="fa fa-fw fa-user-secret"></i> Staffs</a>
                            </li>
                            <li>
                                <a href="{!! url('admin/language-settings') !!}"><i class="fa fa-fw fa-language"></i> Language Settings</a>
                            </li>
                            <li>
                                <a href="{!! url('admin/theme-color') !!}"><i class="fa fa-fw fa-paint-brush"></i> Theme Color</a>
                            </li>
                            <li>
                                <a href="{!! url('admin/sliders') !!}"><i class="fa fa-fw fa-photo"></i> Slider settings</a>
                            </li>
                            <li>
                                <a href="#serviceSection" class="submenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-tasks"></i> Service Section</a>
                                <ul class="collapse list-unstyled" id="serviceSection">
                                    <li><a href="{!! url('admin/service') !!}">service section content</a></li>
                                    <li><a href="{!! url('admin/service/titles') !!}">service section title</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#volunteerSection" class="submenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-file-image-o"></i> Volunteers </a>
                                <ul class="collapse list-unstyled" id="volunteerSection">
                                    <li><a href="{!! url('admin/volunteer') !!}">Volunteer section content</a></li>
                                    <li><a href="{!! url('/admin/volunteer/titles') !!}">Volunteer section title</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#portfolioSection" class="submenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-file-image-o"></i> Portfolio Section</a>
                                <ul class="collapse list-unstyled" id="portfolioSection">
                                    <li><a href="{!! url('admin/portfolio') !!}">Portfolio section content</a></li>
                                    <li><a href="{!! url('/admin/portfolio/titles') !!}">Portfolio section title</a></li>
                                </ul>
                            </li>
                            {{--<li>--}}
                                {{--<a href="{!! url('admin/counter') !!}"><i class="fa fa-fw fa-sort-numeric-asc"></i> Counter section</a>--}}
                            {{--</li>--}}
                        @endif
                        <li>
                            <a href="#blogSection" class="submenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-file-text"></i> Blog Section</a>
                            <ul class="collapse list-unstyled" id="blogSection">
                                <li><a href="{!! url('admin/blog') !!}">Blog section content</a></li>
                                <li><a href="{!! url('admin/blog/titles') !!}">Blog section title</a></li>
                            </ul>
                        </li>
                        @if(Auth::user()->role == "administrator")
                            <li>
                                <a href="#testimonialSection" class="submenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-quote-right"></i> testimonial Section</a>
                                <ul class="collapse list-unstyled" id="testimonialSection">
                                    <li><a href="{!! url('admin/testimonial') !!}">testimonial section content</a></li>
                                    <li><a href="{!! url('admin/testimonial/titles') !!}">testimonial section title</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#pageSettings" class="submenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-file-code-o"></i> Page Settings</a>
                                <ul class="collapse list-unstyled" id="pageSettings">
                                    <li><a href="{!! url('admin/pagesettings/about') !!}">About us page</a></li>
                                    <li><a href="{!! url('admin/pagesettings/faq') !!}">FAQ page</a></li>
                                    <li><a href="{!! url('admin/pagesettings/contact') !!}">Contact us page</a></li>
                                    <li><a href="{!! url('admin/pagesettings/splits') !!}">Slider Split Section</a></li>
                                    <li><a href="{!! url('admin/pagesettings/brands') !!}">Partners</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{!! url('admin/social') !!}"><i class="fa fa-fw fa-paper-plane"></i> Social settings</a>
                            </li>
                            <li>
                                <a href="#seoTools" class="submenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-wrench"></i> SEO Tools</a>
                                <ul class="collapse list-unstyled" id="seoTools">
                                    <li><a href="{!! url('admin/tools/google') !!}">Google Analytics</a></li>
                                    <li><a href="{!! url('admin/tools/meta') !!}">website meta keywords</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#generalSettings" class="submenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-cogs"></i> General Settings</a>
                                <ul class="collapse list-unstyled" id="generalSettings">
                                    <li><a href="{!! url('admin/settings/logo') !!}">logo</a></li>
                                    <li><a href="{!! url('admin/settings/favicon') !!}">favicon</a></li>
                                    <li><a href="{!! url('admin/settings/contents') !!}">Website Contents</a></li>
                                    <li><a href="{!! url('admin/settings/payment') !!}">Payment information</a></li>
                                    <li><a href="{!! url('admin/settings/background') !!}">background image</a></li>
                                    <li><a href="{!! url('admin/settings/info') !!}">about us</a></li>
                                    <li><a href="{!! url('admin/settings/address') !!}">office address</a></li>
                                    <li><a href="{!! url('admin/settings/footer') !!}">footer</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{!! url('admin/subscribers') !!}"><i class="fa fa-fw fa-group"></i> Subscribers</a>
                            </li>
                        @endif
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

