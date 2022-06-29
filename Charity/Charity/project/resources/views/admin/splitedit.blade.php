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
                                        <h2>Update Split</h2>
                                        <a href="{!! url('admin/pagesettings/splits') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <form method="POST" action="{!! action('PageSettingsController@splitupdate',['id' => $split->id]) !!}" class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="select">Split Icon*</label>
                                            <div class="col-sm-2">
                                                Current Icon: <span id="icon"><i class="fa fa-2x {{$split->icon}}"></i></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <select id="select" name="icon" class="fa-select">
                                                    <option value="">No Icon</option>
                                                    <option value="{{$split->icon}}" selected>{{$split->icon}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="latest_campaign_secttion_title">Split Title *</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="title" value="{{$split->title}}" id="latest_campaign_secttion_title" placeholder="Enter Latest Section Title" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="faq_answer">Split Text*</label>
                                            <div class="col-sm-8">
                                                <textarea name="text" id="faq_answer" class="form-control" placeholder="FAQ Answer" style="resize: vertical;" required>{{$split->text}}</textarea>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Update Split</button>
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
            new nicEditor({fullPanel : true}).panelInstance('faq_answer');
        });

        $.get('https://rawgit.com/FortAwesome/Font-Awesome/master/src/icons.yml', function(data) {
            var parsedYaml = jsyaml.load(data);
            $.each(parsedYaml.icons, function(index, icon){
                $('#select').append('<option value="fa-' + icon.id + '">' + icon.id + '</option>');
            });

            $("#select").chosen({
                enable_split_word_search: true,
                search_contains: true
            });
            //$("#icon").html('<i class="fa fa-2x ' + $('#select').val() + '"></i>');
        });

        /* Detect any change of option*/
        $("#select").change(function(){
            var icono = $(this).val();
            $("#icon").html('<i class="fa fa-2x ' + icono + '"></i>');
        });
    </script>
@stop