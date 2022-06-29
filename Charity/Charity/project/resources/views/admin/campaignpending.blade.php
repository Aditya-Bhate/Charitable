@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Pending Campaigns data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header campaigns">
                                        <h2>Pending Campaigns</h2>
                                        <a href="{{url('admin/campaign')}}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive">
                                        <div id="res" class="col-md-12">
                                            @if(Session::has('message'))
                                                <div class="alert alert-success alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    {{ Session::get('message') }}
                                                </div>
                                            @endif
                                            @if(Session::has('error'))
                                                <div class="alert alert-danger alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    {{ Session::get('error') }}
                                                </div>
                                            @endif
                                        </div>
                                        <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Campaign Name</th>
                                                    <th>Date</th>
                                                    <th>Goal</th>
                                                    <th>Created By</th>
                                                    <th>Category</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($campaigns as $campaign)
                                                <tr>
                                                    <td>{{$campaign->title}}</td>
                                                    <td>{{date('d M',strtotime($campaign->created_at))}} - {{date('d M',strtotime($campaign->end_date))}}</td>
                                                    <td>${{$campaign->goal}}</td>
                                                    <td>{{$campaign->createdby->name}}</td>
                                                    <td>{{$campaign->category}}</td>
                                                    <td>
                                                        <a href="{{$campaign->id}}/pending" class="btn btn-success btn-xs product-btn"><i class="fa fa-eye"></i> View </a>
                                                        <a href="{{$campaign->id}}/accept" class="btn btn-primary btn-xs product-btn"><i class="fa fa-check"></i> Accept </a>

                                                        <a href="javascript:;" data-title="Reject Campaign" data-href="{{url('/')}}/admin/campaign/{{$campaign->id}}/reject" data-toggle="modal" data-target="#confirm" class="btn btn-warning btn-xs product-btn"><i class="fa fa-times"></i> Reject </a>

                                                        <a href="javascript:;" data-title="Reject & Delete Campaign" data-href="{{url('/')}}/admin/campaign/{{$campaign->id}}/hardreject" data-toggle="modal" data-target="#confirm" class="btn btn-danger btn-xs product-btn"><i class="fa fa-trash"></i> Reject & Delete </a>

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
                    <!-- Ending of Dashboard Pending Campaigns data-table area -->

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content panel-danger">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel"></h3>
                </div>
                <div class="modal-body">
                    <h4>Do you want to proceed?</h4>
                    <form method="GET" action="" id="reform" class="form-horizontal form-label-left">
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea placeholder="Reject Reason(Required)" rows="6" name="reason" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block btn-ok">Reject</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')
    <script>
        $('#confirm').on('show.bs.modal', function(e) {
            $(this).find('#reform').attr('action', $(e.relatedTarget).data('href'));
            $(this).find('#myModalLabel').html($(e.relatedTarget).data('title'));
            $(this).find('.btn-ok').html($(e.relatedTarget).data('title'));
        });
    </script>
@stop