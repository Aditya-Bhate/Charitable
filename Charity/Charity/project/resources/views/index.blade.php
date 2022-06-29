@extends('includes.masterpage')
@section('content')


    @if($pagesettings[0]->slider_status)
    <!-- Starting of Slider area -->
    <section class="go-slider">
        <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

            <!-- Indicators -->
            {{--<ol class="carousel-indicators">--}}
                {{--@for ($i = 0; $i < count($sliders); $i++)--}}
                    {{--@if($i == 0)--}}
                        {{--<li data-target="#bootstrap-touch-slider" data-slide-to="{{$i}}" class="active"></li>--}}
                    {{--@else--}}
                        {{--<li data-target="#bootstrap-touch-slider" data-slide-to="{{$i}}"></li>--}}
                    {{--@endif--}}
                {{--@endfor--}}
            {{--</ol>--}}

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

            @for ($i = 0; $i < count($sliders); $i++)
                @if($i == 0)
                    <!-- Third Slide -->
                        <div class="item active">

                            <!-- Slide Background -->
                            <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                            <div class="bs-slider-overlay"></div>

                            <div class="container">
                                <div class="row">
                                    <!-- Slide Text Layer -->
                                    <div class="slide-text {{$sliders[$i]->text_position}}">

                                        <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                                        <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End of Slide -->
                @else
                    <!-- Second Slide -->
                        <div class="item">

                            <!-- Slide Background -->
                            <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                            <div class="bs-slider-overlay"></div>
                            <!-- Slide Text Layer -->
                            <div class="slide-text {{$sliders[$i]->text_position}}">
                                <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                                <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>
                            </div>
                        </div>
                        <!-- End of Slide -->
                    @endif
                @endfor


            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div> <!-- End  bootstrap-touch-slider Slider -->

    </section>
    <!-- Ending of Slider area -->
    @endif

    @if($pagesettings[0]->split_status)
    <!-- Starting of charity service area -->
    <!-- <div class="section-padding charity-service-area-wrapper">
        <div class="container">
            <div class="row">
                @foreach($splits as $split)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="single-charity-service-area">
                        <i class="fa {{$split->icon}}"></i>
                        <h3>{{$split->title}}</h3>
                        <p>{!! $split->text !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> -->
    <!-- Ending of charity service area -->
    @endif

    @if($pagesettings[0]->welcome_status)
    <!-- Starting of help fund area -->
    <div class="section-padding helping-fund-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img src="{{url('/assets/images/')}}/{{$pagesettings[0]->welcome_image}}" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h1>{{$pagesettings[0]->welcome_title}}</h1>
                    <p>{{$pagesettings[0]->welcome_description}}</p>
                    <!-- @if($pagesettings[0]->w_b_status == 1)
                    <a href="{{$pagesettings[0]->welcome_link}}" class="boxed-btn">{{$language->view_details}}</a>
                    @endif -->
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of help fund area -->
    @endif

    @if($pagesettings[0]->service_status)
    <!-- Starting of service area -->
    <div class="service-area-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->service_title}}</h2>
                        <p>{{$languages->service_text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-md-4 col-sm-6">
                    <div class="single-service-box">
                        <div class="service-icon">
                            <img src="{{url('/assets/images/service')}}/{{$service->icon}}" alt="Service Image">
                        </div>
                        <div class="service-text">
                            <h3>{{$service->title}}</h3>
                            <p>{{$service->text}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Ending of service area -->
    @endif

    @if($pagesettings[0]->category_status)
    <!-- Starting of Campaign Categories area -->
    <div class="campaign-categories-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->category_title}}</h2>
                        <p>{{$languages->category_text}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($categories as $category)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="single-campaignCategories-area">
                        <img src="{{url('/assets/images/category')}}/{{$category->image}}" alt="">
                        <a href="category/{{$category->slug}}" class="single-campaignCategories-header">
                            <h3>{{$category->name}}</h3>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Ending of Campaign Categories area -->
    @endif

    @if($pagesettings[0]->counter_status)
    <!-- Starting of counterUp area -->
    <div class="counter-padding counter-up-section text-center wow fadeInUp" style="background-image: url({{url('/')}}/assets/images/{{$settings[0]->background}});
            background-color: #ddd;
            background-size: cover;
            background-position: center;
            position: relative;
            z-index: 99;
            color: #fff;">
        <div class="container">
            <div class="row">
                <div class="conuter-up-textArea">
                    <div class="col-md-3 col-sm-6">
                        <div class="single-counter-box">
                            {{--<p><i class="fa fa-star"></i></p>--}}
                            <h2 class="counter-number">{{\App\Campaign::where('admin_aproved','yes')->where('status','running')->count()}}</h2>
                            <p>{{$language->running_campaigns}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-counter-box">
                            {{--<p><i class="fa fa-star"></i></p>--}}
                            <h2 class="counter-number">{{\App\Campaign::where('admin_aproved','yes')->where('status','closed')->count()}}</h2>
                            <p>{{$language->completed_campaigns}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-counter-box">
                            {{--<p><i class="fa fa-star"></i></p>--}}
                            <h2 class="counter-number">{{\App\Campaign::totalDonations()}}</h2>
                            <p>{{$language->donations}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-counter-box">
                            {{--<p><i class="fa fa-star"></i></p>--}}
                            <h2>$<span class="counter-number">{{\App\Campaign::totalFunds()}}</span></h2>
                            <p>{{$language->funded}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of counterUp area -->
    @endif

    @if($pagesettings[0]->latest_status)
    <!-- Starting of Latest Campaigns area -->
    <div class="section-padding latest featured-auction-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->newcamp_title}}</h2>
                        <p>{{$languages->newcamp_text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel featured-list">
                        @foreach($newcampaigns as $campaign)
                        <a href="{{url('/')}}/campaign/{{$campaign->id}}">
                        <div class="single-featured-item">
                            <div class="featured-img">
                                <img class="featured-img" src="{{url('/assets/images/campaign')}}/{{$campaign->feature_image}}" alt="">
                            </div>

                            <div class="featured-text">
                                <h3>{{$campaign->title}}</h3>
                                <div class="featured-meta">
                                    <span>
                                        @if (((strtotime($campaign->end_date)-time())/86400) < 0)
                                            <span>{{0}}</span>
                                        @else
                                            <span>{{ceil((strtotime($campaign->end_date)-time())/86400)}}</span>
                                        @endif
                                            {{$language->days_left}}
                                    </span>
                                    <span class="pull-right"><span>${{\App\Donation::getFund($campaign->id)}}</span> {{$language->funded}}</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="28"
                                         aria-valuemin="0" aria-valuemax="100" style="width:{{round(\App\Donation::getPercent($campaign->id))}}%">
                                        {{round(\App\Donation::getPercent($campaign->id))}}%
                                    </div>
                                </div>
                                <p>{{ substr(strip_tags($campaign->description), 0, 120) }}...</p>
                                <div class="featured-meta-bottom">
                                    <span class="featured-left">{{$language->donate}}</span>
                                    <span class="pull-right"><i class="fa fa-heart-o"></i> {{\App\Donation::getDonations($campaign->id)}} {{$language->donations}}</span>
                                </div>
                            </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Latest Campaigns area -->
    @endif

    @if($pagesettings[0]->featured_status)
    <!-- Starting of Featured Campaigns area -->
    <div class="section-padding featured-auction-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->pricing_title}}</h2>
                        <p>{{$languages->pricing_text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel featured-list">
                        @foreach($fcampaigns as $campaign)
                            <a href="{{url('/')}}/campaign/{{$campaign->id}}">
                        <div class="single-featured-item">
                                <div class="featured-img">
                                    <img class="featured-img" src="{{url('/assets/images/campaign')}}/{{$campaign->feature_image}}" alt="">
                                </div>

                                <div class="featured-text">
                                    <h3>{{$campaign->title}}</h3>
                                    <div class="featured-meta">
                                    <span>
                                        @if (((strtotime($campaign->end_date)-time())/86400) < 0)
                                            <span>{{0}}</span>
                                        @else
                                            <span>{{ceil((strtotime($campaign->end_date)-time())/86400)}}</span>
                                        @endif
                                            {{$language->days_left}}
                                    </span>
                                        <span class="pull-right"><span>${{\App\Donation::getFund($campaign->id)}}</span> {{$language->funded}}</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="28"
                                             aria-valuemin="0" aria-valuemax="100" style="width:{{round(\App\Donation::getPercent($campaign->id))}}%">
                                            {{round(\App\Donation::getPercent($campaign->id))}}%
                                        </div>
                                    </div>
                                    <p>{{ substr(strip_tags($campaign->description), 0, 120) }}...</p>
                                    <div class="featured-meta-bottom">
                                        <span class="featured-left">{{$language->donate}}</span>
                                        <span class="pull-right"><i class="fa fa-heart-o"></i> {{\App\Donation::getDonations($campaign->id)}} {{$language->donations}}</span>
                                    </div>
                                </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Featured Campaigns area -->
    @endif

    @if($pagesettings[0]->volunteer_status)
    <!-- Starting of team area -->
    <div class="our-team-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->volunteer_title}}</h2>
                        <p>{{$languages->volunteer_text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($volunteers as $volunteer)
                    <div class="col-md-3 col-sm-6">
                        <div class="single-team-area">
                            <img src="assets/images/volunteer/{{$volunteer->photo}}" alt="Team member image">
                            <div class="team-area-hover">
                                <div class="member-details">
                                    <h4>{{$volunteer->name}}</h4>
                                    <em>{{$volunteer->designation}}</em>
                                </div>
                                <!-- <div class="member-social-icon">
                                    <ul>
                                        @if($volunteer->facebook != null)
                                            <li><a href="{{$volunteer->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                        @endif
                                        @if($volunteer->twitter != null)
                                            <li><a href="{{$volunteer->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                        @endif
                                        @if($volunteer->google_plus != null)
                                            <li><a href="{{$volunteer->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                                        @endif
                                        @if($volunteer->linkedin != null)
                                            <li><a href="{{$volunteer->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                                        @endif
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Ending of team area -->
    @endif

    @if($pagesettings[0]->portfolio_status)
    <!-- Starting of Gallery area -->
    <div class="gallery-area-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->portfolio_title}}</h2>
                        <p>{{$languages->portfolio_text}}</p>
                    </div>
                </div>
            </div>
            <!-- <div class="row gallery-list">
                @foreach($portfilos as $portfilo)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-gallery-item">
                            <img src="{{url('/assets/images/portfolio')}}/{{$portfilo->image}}" alt="Gallery image">
                            <div class="gallery-overlay"></div>
                            <div class="gallery-icons">
                                <a class="image-popup" href="{{url('/assets/images/portfolio')}}/{{$portfilo->image}}">
                                    <i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> -->
        </div>
    </div>
    <!-- Ending of Gallery area -->
    @endif

    @if($pagesettings[0]->testimonial_status)
    <!-- Starting of carousel testimonial area -->
    <div class="section-padding home-testimonial-wrapper wow fadeInUp" style="background-image: url({{url('/')}}/assets/images/{{$settings[0]->background}});
    background-color: #ddd;
    background-size: cover;
    background-position: center;
    position: relative;
    z-index: 99;
    color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->testimonial_title}}</h2>
                        <p>{{$languages->testimonial_text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="testimonial-section animated fadeInRight">
                        @foreach($testimonials as $testimonial)
                        <div class="single-testimonial-area">
                            <div class="testimonial-text">
                                <p class="ctext">{{$testimonial->review}}</p>
                            </div>
                            <div class="testimonial-author">
                                <img src="{{url('/assets/images')}}/testimonial-author-1.png" alt="Author">
                                <h4><strong>{{$testimonial->client}}</strong> <br> {{$testimonial->designation}}</h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of carousel testimonial area -->
    @endif

    @if($pagesettings[0]->blog_status)
    <!-- Starting of blog area -->
    <div class="section-padding blog-area-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$languages->blog_title}}</h2>
                        <p>{{$languages->blog_text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-area-slider">
                        @foreach($blogs as $blog)
                        <a href="{{url('/blog')}}/{{$blog->id}}" class="single-blog-box">
                            <div class="blog-thumb-wrapper">
                                <img src="{{url('/assets/images/blog')}}/{{$blog->featured_image}}" alt="Blog Image">
                            </div>
                            <div class="blog-text">
                                <p class="blog-meta">{{date('d M Y',strtotime($blog->created_at))}}</p>
                                <h4>{{$blog->title}}</h4>
                                <p>{{substr(strip_tags($blog->details),0,125)}}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of blog area -->
    @endif

    @if($pagesettings[0]->partners_status)
    <!-- Starting of brandLogo-carousel-wrapper area -->
    <!-- <div class="logo-carousel-wrapper wow fadeInUp">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="owl-carousel logo-carousel">
                        @foreach($brands as $brand)
                        <div class="single-logo-item">
                            <div class="logo-item-inner">
                                <img src="{{url('/assets/images/brands')}}/{{$brand->logo}}" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Ending of brandLogo-carousel-wrapper area -->
    @endif

    @if($pagesettings[0]->home_reg_status)
    <!-- Starting of Volunteer registration area -->
    <div class="section-padding volunteer-registration-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img src="{{url('/')}}/assets/images/Donations-min.jpg" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default volunteer-registration">
                        <div class="panel-heading">{{$language->sign_up}}</div>
                        <div class="panel-body">
                            <form action="{{route('user.reg.submit')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div id="resp">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>* {{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>* {{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                    <strong>* {{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn boxed-btn register">{{$language->sign_up}}</button>
                                </div>
                                <div class="form-group text-center">
                                    <a href="{{route('user.login')}}">Already have an account? Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Volunteer registration area -->
    @endif
@stop

@section('footer')
<script>

</script>
@stop