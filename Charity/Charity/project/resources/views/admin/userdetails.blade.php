@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard User Details -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>User Details</h2>
                                        <a href="{!! url('admin/users') !!}" class="add-newProduct-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive order-details-table">
                                        <table class="table">
                                            <tr>
                                                <th>User ID#</th>
                                                <td>{{$customer->id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Account Status:</th>
                                                @if($customer->status != 0)
                                                    <td style="color: #008000;"> <strong>Active</strong></td>
                                                @else
                                                    <td style="color: #ff0000;"><strong>Banned</strong></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>User Name:</th>
                                                <td>{{$customer->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>User Email:</th>
                                                <td>{{$customer->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>User Phone:</th>
                                                <td>{{$customer->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th>Country:</th>
                                                <td>{{$customer->country}}</td>
                                            </tr>
                                            <tr>
                                                <th>Campaign Created:</th>
                                                <td>{{\App\Campaign::where('createdby',$customer->id)->count()}}</td>
                                            </tr>
                                            <tr>
                                                <th>Joined:</th>
                                                <td>{{$customer->created_at->diffForHumans()}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <hr/>
                                    <a href="email/{{$customer->id}}" class="btn add-product_btn order-details"><i class="fa fa-send"></i> contact customer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard User Details -->

                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop