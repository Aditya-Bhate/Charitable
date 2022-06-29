@extends('user.includes.masterpage-user')

@section('content')

<div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard header items area -->
                    <div class="panel panel-default admin">
                        <div class="panel-heading admin-title">Dashboard!</div>
                        <div class="panel-body dashboard-body">
                            <div class="dashboard-header-area">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{url('user/campaign')}}" class="title-stats title-blue">
                                            <div class="icon"><i class="fa fa-bank fa-5x"></i></div>
                                            <div class="number">{{ \App\Campaign::where('createdby',$user->id)->count() }}</div>
                                            <h4>Total Campaigns!</h4>
                                            <span class="title-view-btn">View All</span>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard header items area -->

                </div>
            </div>
        </div>
    </div>


@stop

@section('footer')

@stop