@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard withdraws area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box withdraws">
                                    <div class="add-product-header">
                                        <h2>Pending Withdraws</h2>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive">
                                        <div id="response" class="col-md-12">
                                            @if(Session::has('message'))
                                                <div class="alert alert-success alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    {{ Session::get('message') }}
                                                </div>
                                            @endif
                                        </div>
                                        <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Campaign Name</th>
                                                <th width="10%">Owner Email</th>
                                                <th>Withdraw Amount</th>
                                                <th width="10%">Method</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($withdraws as $withdraw)
                                                <tr>
                                                    <td>{{$withdraw->campid->title}}</td>
                                                    <td>{{$withdraw->campid->createdby->email}}</td>
                                                    <td>${{$withdraw->amount}}</td>
                                                    <td>{{$withdraw->method}}</td>
                                                    <td>{{$withdraw->created_at}}</td>
                                                    <td>
                                                        <a href="withdraws/{{$withdraw->id}}" class="btn btn-primary product-btn"><i class="fa fa-check"></i> View Details </a>

                                                        <a href="withdraws/accept/{{$withdraw->id}}" class="btn btn-success product-btn"><i class="fa fa-check-circle"></i> Accept</a>

                                                        <a href="withdraws/reject/{{$withdraw->id}}" class="btn btn-danger product-btn"><i class="fa fa-times-circle"></i> Reject</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard withdraws area -->

                </div>
            </div>
        </div>
    </div>


@stop

@section('footer')

@stop