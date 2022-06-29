@extends('user.includes.masterpage-user')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Update New Campaign area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Update Campaign</h2>
                                        <a href="{!! url('user/campaign') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <div id="response" class="col-lg-12">
                                        @if ($errors->has('photo'))
                                            <div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>{{ $errors->first('photo') }}</strong>
                                            </div>
                                        @endif
                                        @if ($errors->has('goal'))
                                            <div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>{{ $errors->first('goal') }}</strong>
                                            </div>
                                        @endif
                                        @if ($errors->has('title'))
                                            <div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <form method="POST" action="{!! action('UserCampaignController@update',['id'=> $campaign->id]) !!}" id="add_form" class="form-horizontal"  enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_campaign_name">Campaign Name*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="title" value="{{$campaign->title}}" id="update_campaign_name" placeholder="Enter Campaign Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_select_campaign_category">Select Category *</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="update_select_campaign_category" id="update_select_campaign_category">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        @if($category->name == $campaign->category)
                                                            <option value="{{$category->name}}" selected>{{$category->name}}</option>
                                                        @else
                                                            <option value="{{$category->name}}">{{$category->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_current_feature_photo">Current Feature Photo*</label>
                                            <div class="col-sm-8">
                                                <img src="{{url('/')}}/assets/images/campaign/{{$campaign->feature_image}}" style="max-width: 200px;" alt="No Photo Added" id="docphoto">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_current_feature_photo">Feature Photo *</label>
                                            <div class="col-sm-8">
                                                <input type="file" accept="image/*" name="photo" class="hidden" onchange="readURL(this)" id="uploadFile"/>
                                                <div id="uploadTrigger" class="btn btn-default form-control">
                                                    <i class="fa fa-upload"></i> <span>Add Feature Photo</span>
                                                </div>
                                                <p>Prefered Image Ratio: (16:9)</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_campaign_description">Campaign Description*</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="description" id="update_campaign_description" rows="5" placeholder="Campaign Description" style="resize: vertical;"  required>{{$campaign->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_campaign_video_link">Campaign Video Link* <span>(Youtube urls only)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="video_link" value="{{$campaign->video_link}}" id="update_campaign_video_link" placeholder="Campaign Video Link">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_campaign_end_date">End Date*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control datepick" name="end_date" value="{{$campaign->end_date}}" id="update_campaign_end_date" placeholder="Enter End Date" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_campaign_goal">Goal* <span>in USD($)</span></label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="goal" value="{{$campaign->goal}}" id="update_campaign_goal" placeholder="Campaign Goal" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_campaign_preloaded_amount">Preloaded Amount(Optional)* <span>Seperated By Comma(,)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="preloaded_amount" value="{{$campaign->preloaded_amount}}" id="update_campaign_preloaded_amount" placeholder="Preloaded Amount">
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Update Campaign</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Update New Campaign area -->


                </div>
            </div>
        </div>

@stop
@section('footer')
    <script>

        $(".datepick").datepicker({
            minDate: new Date(),
            dateFormat: 'yy-mm-dd'
        });

        $("#uploadTrigger").click(function(){
            $("#uploadFile").click();
            $("#uploadFile").change(function(event) {
                $("#uploadTrigger").html($("#uploadFile").val());
            });
        });
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#docphoto').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('update_campaign_description');
        });
    </script>
@stop