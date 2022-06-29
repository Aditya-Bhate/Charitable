@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Campaigns view details data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header campaigns">
                                        <h2>{{$campaign->title}}</h2>
                                        <a href="{!! url('admin/campaign/pending') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover products dt-responsive nowrap" cellspacing="0" width="100%">
                                            <tbody>
                                            <tr>
                                                <td width="30%"><strong>Campaign ID#</strong></td>
                                                <td>{{$campaign->id}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Campaign Status:</strong></td>
                                                <td>{{ucfirst($campaign->status)}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Created On:</strong></td>
                                                <td>{{date('Y-m-d h:i:sa',strtotime($campaign->created_at))}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Created By:</strong></td>
                                                <td>{{$campaign->createdby->name}},{{$campaign->createdby->country}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Campaign Title:</strong></td>
                                                <td>{{$campaign->title}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Campaign Category:</strong></td>
                                                <td>{{$campaign->category}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Feature Image:</strong></td>
                                                <td><img src="{{url('assets/images/campaign')}}/{{$campaign->feature_image}}" alt=""></td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Campaign Video:</strong></td>
                                                <td>{!! \App\Campaign::getVideo($campaign->id) !!}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Campaign Description:</strong></td>
                                                <td>{!! $campaign->description !!}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Campaign Goal:</strong></td>
                                                <td>{{$settings[0]->currency_sign}}{{$campaign->goal}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Campaign End Date:</strong></td>
                                                <td>{{$campaign->end_date}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <hr/>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of Dashboard Campaigns view details data-table area -->

    </div>





@stop

@section('footer')

@stop