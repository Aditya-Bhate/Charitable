@extends('includes.masterpage')

@section('content')

<!-- {{url('/assets/images/package')}}/{{$campaign->feature_image}} -->

    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row" style="margin:0;background-color:rgba(0,0,0,0.7);">

            <div style="margin: 4% 0px 4% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>{{$campaign->title}}</h1>
                </div>
            </div>

        </div>
    </section>

<!-- Starting of Campign Details area -->
<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                <div class="campign-details-content">
                    <h3>{{$language->campaign_details}}</h3>
                    <hr/>
                    <div class="campign-img">
                        <img src="{{url('/assets/images/campaign/'.$campaign->feature_image)}}" alt="Campign img">
                    </div>
                    @if($campaign->video_link != "")
                        <div class="campign-video">
                            {!! \App\Campaign::getVideo($campaign->id) !!}
                        </div>
                    @endif
                    <div class="campign-text">
                        {!! $campaign->description !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                <div class="donate-area">
                    <h3>Donate</h3>

                    <hr/>
                    @if(Session::has('pmail'))
                        <div class="alert alert-success"> {{ Session::get('pmail') }} </div>
                    @endif

                    <div class="donate-user-info">

                        <p>{{$language->created_by}}: </p>
                        <p class="colored">{{$campaign->createdby->name}}</p>
                        <p>{{$campaign->createdby->country}}</p>
                    </div>
                    <p><strong>{{$settings[0]->currency_sign}}{{$donations}}</strong> {{$language->funded}} of <strong>{{$settings[0]->currency_sign}}{{$campaign->goal}}</strong> {{$language->goal}}</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="18"
                             aria-valuemin="0" aria-valuemax="100" style="width:{{round($percent)}}%">
                            {{round($percent)}}%
                        </div>
                    </div>

                    <div class="pull-left">
                             @if (((strtotime($campaign->end_date)-time())/86400) < 0)
                                <strong>{{0}}</strong>
                            @else
                                <strong>{{ceil((strtotime($campaign->end_date)-time())/86400)}}</strong>
                            @endif
                            {{$language->days_left}}
                    </div>
                    <div class="pull-right"><strong>{{\App\Donation::getDonations($campaign->id)}}</strong> {{$language->donations}}</div>

                    <hr class="campign-hr">

                    <div class="campign-social-links">
                        <div class="profile-group">
                            <!-- AddToAny BEGIN -->
                            <div class="a2a_kit a2a_kit_size_40 a2a_default_style">
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_google_plus"></a>
                                <a class="a2a_button_linkedin"></a>
                                <a class="a2a_dd" href="https://www.vitproject.com"></a>
                            </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <!-- AddToAny END -->
                        </div>
                    </div>

                    <form action="{{action('FrontEndController@donate' , ['id'=>$campaign->id])}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="donation">{{$language->donate}} {{$language->amount}}({{$settings[0]->currency_code}}):</label>
                            <input type="text" class="form-control"  pattern="[0-9]+(\.[0-9]{0,2})?%?"
                                   title="Price must be a numeric or up to 2 decimal places." name="amount" id="donation" required>
                        </div>
                        @if($campaign->preloaded_amount != "")
                            <div class="form-group">
                                <ul>
                                    @forelse(explode(',',$campaign->preloaded_amount) as $preload)
                                        <li><a href="javascript:;" class="pre" id="{{$preload}}">${{$preload}}</a></li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        @endif
                        <div class="form-group text-center">
                            <button class="donate-submit">{{$language->donate}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ending of Campign Details area -->

@stop

@section('footer')
<script>

    $(".pre").click(function () {
        var val = parseFloat($(this).attr('id'));
        $("#donation").val(val);
    })


</script>
@stop