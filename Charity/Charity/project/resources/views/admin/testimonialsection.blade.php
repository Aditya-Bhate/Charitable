@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of testimonials data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header products">
                                        <h2>Testimonials</h2>
                                        <a href="{!! url('admin/testimonial/create') !!}" class="add-newProduct-btn"><i class="fa fa-plus"></i> add testimonials</a>
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
                                                <th width="25%">Review Text</th>
                                                <th>Client's Name</th>
                                                <th>Designation</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($testimonials as $testimonial)
                                                <tr>
                                                    <td>{{$testimonial->review}}</td>
                                                    <td>{{$testimonial->client}}</td>
                                                    <td>{{$testimonial->designation}}</td>
                                                    <td>
                                                        <form method="POST" action="{!! action('TestimonialController@destroy',['id' => $testimonial->id]) !!}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="testimonial/{{$testimonial->id}}/edit" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit </a>
                                                            <button type="submit" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove </button>
                                                        </form>
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
                    <!-- Ending of Dashboard testimonials data-table area -->


                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop