@extends('includes.masterpage')

@section('content')

    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row" style="margin:0;background-color:rgba(0,0,0,0.7);">
            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>{{$language->blog}}</h1>
                </div>
            </div>
        </div>
    </section>


    <!-- Starting of All blogs area -->
    <div class="section-padding all-blogs-area-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a href="{{url('/')}}/blog/{{$blog->id}}" class="single-all-blogs-box">
                        <div class="blog-thumb-wrapper">
                            <img src="{{url('/')}}/assets/images/blog/{{$blog->featured_image}}" alt="Blog Image">
                        </div>
                        <div class="blog-text">
                            <p class="blog-meta">{{date('d M Y',strtotime($blog->created_at))}}</p>
                            <h4>{{$blog->title}}</h4>
                            <p>{{substr(strip_tags($blog->details),0,125)}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Ending of All blogs area -->

@stop

@section('footer')

@stop