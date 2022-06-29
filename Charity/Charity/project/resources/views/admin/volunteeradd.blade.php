@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard add-product-1 area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Add New Volunteer</h2>
                                        <a href="{!! url('admin/volunteer') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <div id="response" class="col-md-12">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form method="POST" action="{!! action('VolunteerController@store') !!}" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_icon">Volunteer Photo*</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="photo" id="service_icon" accept="image/*" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_title">Volunteer Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="name" id="service_title" placeholder="e.g sports" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_title2">Designation* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="designation" id="service_title2" placeholder="e.g sports" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_title3">Facebook Link* </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="facebook" placeholder="e.g www.vitproject.com" id="service_title3">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_title4">Google+ Link* </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="google_plus" placeholder="e.g www.vitproject.com" id="service_title4">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_title5">Twitter Link* </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="twitter" placeholder="e.g www.vitproject.com" id="service_title5">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="service_title6">Linkedin Link* </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="linkedin" placeholder="e.g www.vitproject.com" id="service_title6">
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Add Volunteer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard add-product-1 area -->


                </div>
            </div>
        </div>
    </div>


@stop

@section('footer')
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true}).panelInstance('content1');
        });
    </script>
@stop