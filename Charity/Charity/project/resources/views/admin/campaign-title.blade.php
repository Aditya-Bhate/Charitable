@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Campaign Section Title -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Campaign Section Title &amp; Text</h2>
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
                                    <form method="POST" action="titles" class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="featured_campaign_secttion_title">Featured Campaign Section Title *</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="pricing_title" value="{{$languages->pricing_title}}" id="featured_campaign_secttion_title" placeholder="Enter Featured Section Title" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="featured_campaign_section_text">Featured Campaign Section Text *</label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" name="pricing_text" id="featured_campaign_section_text" placeholder="Enter Featured Section Text" rows="5" style="resize: vertical;">{{$languages->pricing_text}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="latest_campaign_secttion_title">Latest Campaign Section Title *</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="newcamp_title" value="{{$languages->newcamp_title}}" id="latest_campaign_secttion_title" placeholder="Enter Latest Section Title" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="latest_campaign_section_text">Latest Campaign Section Text *</label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" name="newcamp_text" id="latest_campaign_section_text" placeholder="Enter Campaign Section Tex" rows="5" style="resize: vertical;">{{$languages->newcamp_text}}</textarea>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update text</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Campaign Section Title -->


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