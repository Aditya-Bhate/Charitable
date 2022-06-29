@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard services data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header products">
                                        <h2>Partners</h2>
                                        <a href="{!! url('admin/brand/create') !!}" class="add-newProduct-btn"><i class="fa fa-plus"></i> add Partner</a>
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
                                                <th>Partner Logo</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($brands as $brand)
                                                <tr>
                                                    <td><img src="{{url('/assets/images/brands')}}/{{$brand->logo}}" alt="" class="service-icon"></td>

                                                    <td>
                                                        <a href="{{url('/admin/brand/delete')}}/{{$brand->id}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove </a>
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
                    <!-- Ending of Dashboard services data-table area -->

                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop