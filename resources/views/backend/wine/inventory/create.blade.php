@extends('backend.layouts.master')
@section('content')

    <h1>Add to Existing Inventory</h1>
    <hr/>

<div class="section" style="background-color:#fff; padding:2em;">

    {!! Form::open(['url' => 'admin/wine/inventory/store', 'class' => 'form-inline click-animations']) !!}

    <div class="input-group col-lg-8 col-xs-8 col-md-8">
        {!! Form::label('ajax_search', 'UPC / Name: ', ['for' => 'ajax_search', 'class' => 'control-label']) !!}
        <div style="clear: both;"></div>
        {!! Form::text('ajax_search', null, ['class' => 'form-control', 'id' => "search_box" , 'placeholder' => 'example: Jack London']) !!}
        {!! $errors->first('ajax_search', '<p class="help-block">:message</p>') !!}
    </div>

    <?php
        /*
         *
        foreach($innerjoins as $obj){
            echo $obj->quantity . " " . $obj->location;
        }
         */
        ?>


    <div class="input-group col-lg-5 col-xs-5 col-md-5">
        <div id="search_results" class="container">
            <div id="result">


            </div>

            <div class="col-md-4" id="singleResult" style="display:none;margin-top:1em;margin-bottom:1em;background-color:#ecf0f5; !important">
                <div class="col-md-12" style="border-bottom:1px solid #abb9d3;">
                    <h4>Name</h4>
                    <span style="font-size:1.2em;" id="name">Test</span>
                </div>
            <div style="clear:both;"></div>

                <div class="col-md-12" style="border-bottom:1px solid #abb9d3;">
                    <h4>Inventory</h4>
                    <ul id="inventory_locations_list">

                    </ul>
                    <span style="font-size:1.2em;" id="inventory">Test</span>
                </div>
                <div style="clear:both;"></div>


                <div class="col-md-12" style="border-bottom:1px solid #abb9d3;">
                    <h4>Cost</h4>
                    <span style="font-size:1.2em;" id="cost">Test</span>
                </div>
                <div style="clear:both;"></div>


                <div class="col-md-12" style="border-bottom:1px solid #abb9d3;">
                    <h4>Total Cost on Hand</h4>
                    <span style="font-size:1.2em;" id="cost_on_hand">Test</span>
                </div>
                <div style="clear:both;"></div>


                <div class="col-md-12">
                    <h4>Selling Price</h4>
                    <span style="font-size:1.2em;" id="selling_price">Test</span>
                </div>
            </div>
        </div>
    </div>

    <div class="input-group col-lg-8 col-xs-8 col-md-8">
        {!! Form::label('quantity', 'Quantity Adding: ', ['for' => 'quantity', 'class' => 'control-label']) !!}
        <div style="clear: both;"></div>
        {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>


    <div class="input-group col-lg-8 col-xs-8 col-md-8" style="padding-top:2em;">
        {!! Form::label('location_id', 'Location: ', ['for' => 'name', 'class' => 'control-label']) !!}
        <div style="clear: both;"></div>
        <select id="add_location_select" class="form-control" name="location_id">
            @if($inventory_locations)
                @foreach ($inventory_locations as $inventory_location)
                    <option value="{{ $inventory_location->id }}">{{ $inventory_location->location }}</option>
                @endforeach
            @endif
        </select>
        {!! $errors->first('location_id', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="input-group col-lg-offset-1 col-lg-2 col-xs-2 col-md-2" style="padding-top:2em;">
        {!! Form::label('type_id', 'add Location: ', ['for' => 'name', 'class' => 'control-label']) !!}
        <div style="clear: both;"></div>

        <button id="modalLocationPop" class="btn btn-success" onClick="return false;">Add Location</button>
    </div>


    <div class="input-group col-lg-8 col-xs-8 col-md-8">
        {!! Form::label('notes', 'Notes: ', ['for' => 'notes', 'class' => 'control-label']) !!}
        <div style="clear: both;"></div>
        {!! Form::text('notes', null, ['class' => 'form-control']) !!}
        {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
    </div>


    <div style="clear:both;"> &nbsp; </div>


    <input type="hidden" name="wine_id" class="wine_id" id="wine_id" value="">


    <div class="input-group col-lg-5 col-xs-5 col-md-5" style="padding-top:2em;">
            <input class="btn btn-primary form-control" type="submit" value="ADD TO EXISTING INVENTORY" style="margin:0;padding:0;font-size: 24px;">
        </div>
    <div class="input-group col-lg-offset-1 col-lg-2 col-xs-2 col-md-2" style="padding-top:2em;">
        <button class="btn btn-success form-control" style="background-color:#000;margin:0;padding:0;height: 1.5em;
    font-size: 24px;
    outline: none;
    border: 2px solid transparent;
    transition: 0.3s;
    box-shadow: none;
    border-color: #d2d6de;
    border-top-color: rgb(210, 214, 222);
    border-right-color: rgb(210, 214, 222);
    border-bottom-color: rgb(210, 214, 222);
    border-left-color: rgb(210, 214, 222);">CANCEL</button>
    </div>

    {!! Form::close() !!}

    @include('includes.ajax_datatables')
    @include('backend.wine.partials.addlocation');
    @include('includes.ajax_functions');

    <script type="text/javascript">
        $('#modalpopper').click(function() {
            $('#addtypeModal').modal('show');
        });

    </script>

    <script type="text/javascript">

        function select_list_success( selector, data, fields )
        {
            console.log("Selector we're using:" +  selector);
            if(fields) {
                console.log(fields);
            } else {
                return false;
            }
            //Clear Types Select Options
            $(selector).html(' ');
            $.each(data, function(i, value) {
                $(selector).append($('<option>').text(data[i][fields[0]]).attr('value', data[i][fields[1]]));
            });
        }

        var _token = $('meta[name="_token"]').attr('content');

        var wine_location_field_selectors = ['#wine_location'];

        var form_objects = {
            '#add_location_select': {
                'self_selector': '#add_location_select',
                'self_handler': 'select_list_success',
                'db_return_fields': ['location', 'id'],
                'success_selector': '.print-location-success-msg',
                'error_selector' :  '.print-location-error-msg',
                'success_function': 'printMsg',
                'error_function': 'printMsg'

            }
        };

        function handleLocations( data )
        {
            if( form_objects['#add_location_select'].hasOwnProperty('self_handler')){
                console.log("Found " + form_objects['#add_location_select']['self_handler']);
                db_fields = '';
                var fn = window[form_objects['#add_location_select']['self_handler']];

                if( form_objects['#add_location_select'].hasOwnProperty('db_return_fields') ) db_fields = form_objects['#add_location_select']['db_return_fields'];
                if( form_objects['#add_location_select'].hasOwnProperty('self_selector') ) {
                    if (typeof fn === "function"){
                        console.log("Handler is a function!!!");
                        fn( form_objects['#add_location_select']['self_selector'], data, db_fields );
                    }
                }
            }
        }

        $(document).ready(function() {

            console.log(form_objects);

            $.each(form_objects, function(i, value) {
                console.log(i);
            });

            // Notes Ajax Sending of Data
            $('#addlocation_button').click(function(e) {
                resetMsgs();
                e.preventDefault();
                var data = buildDataForAjax(_token, wine_location_field_selectors);
                var url = "{{config('app.url')}}/admin/add_location";
                sendAjax( data, url ).success(function (result) {
                    ajaxResponse( result, form_objects['#add_location_select'] );
                });
            });



        });


        //Contrived Code, it works
        var globalTimeout = null;
        var timeout = 1000;
        $(document).ready(function(){
                $('#search_box').keyup(function() {
                    var search = $('#search_box').val();
                    if(search != '' ){
                        search_box_go();
                }
            });
        });

        function search_box_go(){
                    if (globalTimeout != null) {
                        clearTimeout(globalTimeout);
                    }
                    globalTimeout = setTimeout(function() {
                        globalTimeout = null;
                        var form_values = $( "form" ).serialize();
                        // Send the data using post
                        var posting = $.post( "{{config('app.url')}}/admin/search_inventory", form_values );
                        //$( "#search_results" ).empty();
                        // Put the results in a div
                        var data = buildDataForAjax(_token, ['#search_box'] );
                        var url = "{{config('app.url')}}/admin/search_inventory";
                        sendAjax( data, url ).success(function (result) {
                            handleSearchResponse(result);
                        });
                    }, timeout);
        }

        $(document).ready(function() {
            var search = $('#search_box').val();
            if(search != '' ) {
                search_box_go();
            }
        });
    </script>


    <style type="text/css">
        #searchList .item{
            padding:1em;
            color:#367fa9;
        }
    </style>


    <script type="text/javascript">
        $('#modalLocationPop').click(function() {
            $('#addlocationModal').modal('show');
        });
    </script>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection