<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="keywords" content="{{$code[0]->meta_keys}}">
    <meta name="author" content="vitproject">
    <title>{{$settings[0]->title}}</title>

    <link rel="icon" 
      type="image/png" 
      href="{{url('/')}}/assets/images/{{$settings[0]->favicon}}">

    <!-- Bootstrap Core CSS -->

    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/slicknav.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/genius-slider.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/responsive.css')}}" rel="stylesheet">
    
</head>
<body>
<div id="cover"></div>

<!-- Starting of header area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <div class="top-column-left">
                        <ul>
                            <li>
                                <i class="fa fa-envelope"></i> {{$settings[0]->email}}
                            </li>
                            @if($settings[0]->phone != null)
                                <li>
                                    <i class="fa fa-phone"></i> {{$settings[0]->phone}}
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-5">
                    <div class="top-column-right">
                        <ul class="top-social-links">
                            <li class="top-social-links-li">
                                @if($sociallinks[0]->f_status == "enable")
                                    <a href="{{$sociallinks[0]->facebook}}"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if($sociallinks[0]->t_status == "enable")
                                    <a href="{{$sociallinks[0]->twiter}}"><i class="fa fa-twitter"></i></a>
                                @endif
                                @if($sociallinks[0]->g_status == "enable")
                                    <a href="{{$sociallinks[0]->g_plus}}"><i class="fa fa-google"></i></a>
                                @endif
                                @if($sociallinks[0]->link_status == "enable")
                                    <a href="{{$sociallinks[0]->linkedin}}"><i class="fa fa-linkedin"></i></a>
                                @endif
                            </li>
                            @if(Auth::guard('profile')->guest())
                                <li><a href="{{url('user/login')}}" class="header-buttons">{{$language->log_in}}</a></li>
                                <li><a href="{{url('user/registration')}}" class="header-buttons">{{$language->sign_up}}</a></li>
                            @else
                                <li><a href="{{url('user/dashboard')}}" class="header-buttons">{{$language->my_account}}</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" class="header-buttons"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{$language->logout}}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-area-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{ URL::asset('assets/images/logo')}}/{{$settings[0]->logo}}" alt="{{$settings[0]->title}}">
                        </a>
                    </div>
                    <div id="mobile-menu-wrap"></div>
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="mainmenu">
                        <ul id="menuResponsive">
                            <li><a href="{{ url('/') }}" class="">{{$language->home}}</a></li>
                            <li><a href="{{ url('/campaigns') }}" class="">{{$language->campaigns}}</a></li>
                            @if($pagesettings[0]->a_status == 1)
                                <li><a href="{{url('/about')}}" class="">{{$language->about_us}}</a></li>
                            @endif
                            @if($pagesettings[0]->f_status == 1)
                                <li><a href="{{url('/faq')}}" class="">{{$language->faq}}</a></li>
                            @endif
                            <li><a href="{{ url('/blogs') }}" class="">{{$language->blog}}</a></li>
                            @if($pagesettings[0]->c_status == 1)
                                <li><a href="{{url('/contact')}}" class="">{{$language->contact_us}}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of header area -->

    @yield('content')

    <!-- starting of subscribe newsletter area -->
    <!-- <div class="subscribe-newsletter-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="subscribe-newsletter-area">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <h4>{{$language->subscription}}</h4>
                                {{--<p>Lorem ipsum dolor sit amet, consectetur.</p>--}}
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                <form action="{{action('FrontEndController@subscribe')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="email" name="email" placeholder="Email Address" required>
                                    <button type="submit" class="btn btn-primary">{{$language->subscribe}}</button>
                                </form>
                                <p id="resp">
                                    @if(Session::has('subscribe'))
                                        {{ Session::get('subscribe') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Ending of subscribe newsletter area -->

    <!-- starting of footer area -->
    <footer class="section-padding footer-area-wrapper wow fadeInUp">
        <!-- <div class="container"> -->
            <!-- <div class="row"> -->
                <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="single-footer-area">
                        <div class="footer-title">
                            <div class="footer-title">
                                {{$language->about_us}}
                            </div>
                        </div>
                        <div class="footer-content">
                            <p>{!! $settings[0]->about !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="single-footer-area">
                        <div class="footer-title">
                            {{$language->footer_links}}
                        </div>
                        <div class="footer-content">
                            <ul class="about-footer">
                                <li><a href="{{url('/')}}"><i class="fa fa-caret-right"></i> {{$language->home}}</a></li>
                                <li><a href="{{url('/about')}}"><i class="fa fa-caret-right"></i> {{$language->about_us}}</a></li>
                                <li><a href="{{url('/faq')}}"><i class="fa fa-caret-right"></i> {{$language->faq}}</a></li>
                                <li><a href="{{url('/contact')}}"><i class="fa fa-caret-right"></i> {{$language->contact_us}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="single-footer-area">
                        <div class="footer-title">
                            {{$language->latest_blogs}}
                        </div>
                        <div class="footer-content">
                            <ul class="latest-tweet">
                                @foreach($lblogs as $lblog)
                                    <li>
                                        <a href="{{url('/blog')}}/{{$lblog->id}}">
                                            <img src="{{url('/assets/images/blog')}}/{{$lblog->featured_image}}" alt="">
                                            <span>{{$lblog->title}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12"> -->
                    <!-- <div class="single-footer-area"> -->
                        <!-- <div class="footer-title">
                            {{$language->contact_us}}
                        </div> -->
                        <!-- <div class="footer-content">
                            <div class="contact-info">
                                <p class="contact-info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    {{$settings[0]->address}}
                                </p>
                                @if($settings[0]->phone != null)
                                    <p class="contact-info">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <a href="tel:{{$settings[0]->phone}}">{{$settings[0]->phone}}</a><br/>
                                    </p>
                                @endif
                                @if($settings[0]->fax != null)
                                    <p class="contact-info">
                                        <i class="fa fa-fax" aria-hidden="true"></i>
                                        <a href="tel:{{$settings[0]->fax}}">{{$settings[0]->fax}}</a><br/>
                                    </p>
                                @endif
                                <p class="contact-info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <a href="mailto:{{$settings[0]->email}}">{{$settings[0]->email}}</a>
                                </p>
                            </div>
                        </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
        <!-- </div> -->
        <!-- <hr/> -->
        <div class="footer-copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <p class="copy-right-side">
                            {!! $settings[0]->footer !!}
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="footer-social-links">
                            <ul>
                                @if($sociallinks[0]->f_status == "enable")
                                    <li>
                                        <a class="facebook" href="{{$sociallinks[0]->facebook}}">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                @endif
                                @if($sociallinks[0]->g_status == "enable")
                                    <li>
                                        <a class="google" href="{{$sociallinks[0]->g_plus}}">
                                            <i class="fa fa-google"></i>
                                        </a>
                                    </li>
                                @endif
                                @if($sociallinks[0]->t_status == "enable")
                                    <li>
                                        <a class="twitter" href="{{$sociallinks[0]->twiter}}">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                @endif
                                @if($sociallinks[0]->link_status == "enable")
                                    <li>
                                        <a class="tumblr" href="{{$sociallinks[0]->linkedin}}">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Ending of footer area -->

    <!-- jQuery -->
    <script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/wow.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/genius-slider.js')}}"></script>
    <script src="{{ URL::asset('assets/js/main.js')}}"></script>
    {!! $code[0]->google_analytics !!}
    @yield('footer')
    <script type="text/javascript">

        $(window).load(function(){
                    setTimeout(function(){
                    $('#cover').fadeOut(1000);
                    },1000)
                });

    </script>
</body>
</html>