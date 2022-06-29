@extends('includes.masterpage')

@section('content')

    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row" style="margin:0;background-color:rgba(0,0,0,0.7);">
            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>{{$language->campaigns}}</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- starting of Available Campaigns area -->
    <div class="section-padding available-campaign-wrapper">
        <div class="container">
            <div class="row">
                @foreach($campaigns as $campaign)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a href="{{url('/')}}/campaign/{{$campaign->id}}" class="single-featured-item">
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
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Ending of Available Campaigns area -->

@stop

@section('footer')

@stop