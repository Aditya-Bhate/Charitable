@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Users area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box customers">
                                    <div class="add-product-header">
                                        <h2>Users</h2>
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
                                                <th>Full Name</th>
                                                <th width="10%">Email</th>
                                                <th>Phone</th>
                                                <th width="10%">Country</th>
                                                <th width="5%">Campaigns</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($customers as $customer)
                                                <tr>
                                                    <td>{{$customer->name}}</td>
                                                    <td>{{$customer->email}}</td>
                                                    <td>{{$customer->phone}}</td>
                                                    <td>{{$customer->country}}</td>
                                                    <td>{{\App\Campaign::where('createdby',$customer->id)->count()}}</td>
                                                    <td>
                                                        @if($customer->status != 0)
                                                            Active
                                                        @else
                                                            Banned
                                                        @endif
                                                    </td>

                                                    <td>

                                                        <a href="users/{{$customer->id}}" class="btn btn-primary product-btn"><i class="fa fa-check"></i> View Details </a>
                                                        @if($customer->status != 0)
                                                            <a href="users/status/{{$customer->id}}/0" class="btn btn-danger product-btn"><i class="fa fa-toggle-off"></i> Ban</a>
                                                        @else
                                                            <a href="users/status/{{$customer->id}}/1" class="btn btn-success product-btn"><i class="fa fa-toggle-on"></i> Activate</a>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Users area -->


                </div>
            </div>
        </div>
    </div>



@stop

@section('footer')

@stop