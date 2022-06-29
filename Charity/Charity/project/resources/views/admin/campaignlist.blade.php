@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Campaigns data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header campaigns">
                                        <h2>Campaigns</h2>
                                            <span>
                                                <a href="{{url('admin/campaign/pending')}}"><strong>{{\App\Campaign::campPending()}} Pending</strong></a>
                                            </span>                                            
                                            <a href="{{url('admin/campaign/create')}}" class="add-newProduct-btn"><i class="fa fa-plus"></i> Create New Campaign</a>                                            
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
                                                <th width="20%">Campaign Name</th>
                                                <th>Date</th>
                                                <th>Goal</th>
                                                <th>Funded</th>
                                                <th>Available</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($campaigns as $campaign)
                                                <tr>
                                                    <td>{{$campaign->title}}</td>
                                                    <td>{{date('d M',strtotime($campaign->created_at))}} - {{date('d M',strtotime($campaign->end_date))}}</td>
                                                    <td>${{$campaign->goal}}</td>
                                                    <td>${{\App\Donation::getFund($campaign->id)}}</td>
                                                    <td>${{$campaign->available_fund}}</td>
                                                    <td>{{ucfirst($campaign->status)}}</td>
                                                    <td>
                                                        <a href="campaign/{{$campaign->id}}" class="btn btn-success product-btn"><i class="fa fa-eye"></i> View </a>
                                                        <a href="campaign/{{$campaign->id}}/edit" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit </a>
                                                        @if($campaign->status != "closed")
                                                            <a href="campaign/{{$campaign->id}}/close" class="btn btn-warning product-btn"><i class="fa fa-toggle-on"></i> Close </a>
                                                        @else
                                                            <a href="campaign/{{$campaign->id}}/open" class="btn btn-danger product-btn"><i class="fa fa-toggle-off"></i> Open </a>
                                                        @endif
                                                        <a href="javascript:;" data-href="{{url('/')}}/admin/campaign/{{$campaign->id}}/delete" data-toggle="modal" data-target="#confirm-delete"class="btn btn-danger product-btn"><i class="fa fa-trash"></i></a>
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
                    <!-- Ending of Dashboard Campaigns data-table area -->

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content panel-danger">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-circle fa-fw"></i> Confirm Delete</h3>
                </div>
                <div class="modal-body">
                    <p>You are about to delete this Campaign, All Donations will be deleted under this Campaign.</p>
                    <h4>Do you want to proceed?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')
    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
@stop