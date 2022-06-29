@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard subscribers data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header products">
                                        <h2>all subscribers</h2>
                                        <a href="{!! url('admin/subscribers/download') !!}" class="add-newProduct-btn"><i class="fa fa-download"></i> export</a>
                                    </div>
                                    <hr/>
                                    <div class="table-responsive">
                                        <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>email</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($subscribers as $subscriber)
                                                <tr>
                                                    <td>{{$subscriber->id}}</td>
                                                    <td>{{$subscriber->email}}</td>
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
                    <!-- Ending of Dashboard subscribers data-table area -->

                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop