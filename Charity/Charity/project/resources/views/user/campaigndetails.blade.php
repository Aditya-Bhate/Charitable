@extends('user.includes.masterpage-user')

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
                                        <h2>Campaign Details</h2>
                                        <a href="{!! url('user/campaign') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>

                                    <div class="campaign-tab">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#campaignDetails">Campaign Details</a></li>
                                            <li><a data-toggle="tab" href="#donations">Donations</a></li>
                                            <li><a data-toggle="tab" href="#withdraws">Withdraws</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="campaignDetails" class="tab-pane fade in active">
                                                <h3>{{$campaign->title}} (<a href="{{$campaign->id}}/edit">Edit</a>)</h3>

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
                                            <div id="donations" class="tab-pane fade">
                                                <h3>Total Fund Received: {{$settings[0]->currency_sign}}{{\App\Donation::getFund($campaign->id)}}</h3>
                                                <h3>Total Donations: {{\App\Donation::getDonations($campaign->id)}}</h3>

                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover products dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Donation Amount</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @forelse(\App\Campaign::campDonations($campaign->id) as $donation)
                                                            <tr>
                                                                @if($donation->anonymous != "yes")
                                                                    <td>{{$donation->donator_name}}</td>
                                                                    <td>{{$donation->donator_email}}</td>
                                                                @else
                                                                    <td colspan="2" style="color: darkred">Anonymous Donation</td>
                                                                @endif
                                                                <td>{{$settings[0]->currency_sign}}{{$donation->amount}}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="3">No Donations Yet.</td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="withdraws" class="tab-pane fade">
                                                <h3>Total Withdrawals Made: {{$settings[0]->currency_sign}}{{\App\Withdraw::campWithdraw($campaign->id)}}</h3>
                                                @if(\App\Withdraw::pendWithdraw($campaign->id) > 0)
                                                    <h4>Withdraw Pending: {{$settings[0]->currency_sign}}{{\App\Withdraw::pendWithdraw($campaign->id)}}</h4>
                                                @endif
                                                <h3>Available Fund: ${{$campaign->available_fund}}</h3>

                                                <p><a href="{{url('user/campaign/'.$campaign->id.'/withdraw')}}" class="btn btn-primary">Withdraw Now</a></p>

                                                <div class="table-responsive">
                                                    <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Withdraw Method</th>
                                                            <th>Account</th>
                                                            <th>Withdraw Amount</th>
                                                            <th>Charge</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @forelse(\App\Campaign::campWithdraws($campaign->id) as $withdraw)
                                                            <tr>
                                                                <td>{{$withdraw->created_at}}</td>
                                                                <td>{{$withdraw->method}}</td>
                                                                @if($withdraw->method != "Bank")
                                                                    <td>{{$withdraw->acc_email}}</td>
                                                                @else
                                                                    <td>{{$withdraw->iban}}</td>
                                                                @endif
                                                                <td>{{$settings[0]->currency_sign}}{{$withdraw->amount}}</td>
                                                                <td>{{$settings[0]->currency_sign}}{{$withdraw->fee}}</td>
                                                                <td><label class="label label-default">{{ucfirst($withdraw->status)}}</label></td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6">No Withdrawals Made.</td>
                                                            </tr>
                                                        @endforelse
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
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop