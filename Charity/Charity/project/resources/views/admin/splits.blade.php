@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard orders data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box vendors">
                                    <div class="add-product-header">
                                        <h2>Slider Splits Section</h2>
                                        {{--<a href="{!! url('admin/faq/add') !!}" class="add-newProduct-btn"><i class="fa fa-plus"></i> Add FAQ</a>--}}
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
                                                <th>Icon</th>
                                                <th>Title</th>
                                                <th width="35%">Text</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($splits as $split)
                                                <tr>
                                                    <td><i class="fa fa-2x {{$split->icon}}"></i></td>
                                                    <td>{!! $split->title !!}</td>
                                                    <td>{{strip_tags($split->text)}}</td>
                                                    <td>
                                                        <a href="{{url('/admin/split')}}/{{$split->id}}/edit" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit </a>
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
                    <!-- Ending of Dashboard orders data-table area -->


                </div>
            </div>
        </div>
    </div>


@stop

@section('footer')

@stop