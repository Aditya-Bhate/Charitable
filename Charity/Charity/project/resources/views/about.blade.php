@extends('includes.masterpage')

@section('content')

    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row" style="margin:0;background-color:rgba(0,0,0,0.7);">
            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>{{$language->about_us}}</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Starting of faq area -->
    <div class="section-padding wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $pagedata->about !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of faq area -->
@stop

@section('footer')

@stop