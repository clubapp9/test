@extends('backend.layouts.master')
@section('content')

    <h1>Create New Wine</h1>
    <hr/>

   {{-- {!! Form::open(['url' => 'admin/wine', 'class' => 'form-horizontal']) !!} --}}

    {!! Form::open(['route' => 'admin.wine.store', 'class' => 'form-inline click-animations']) !!}

        <div class="input-group col-lg-5 col-xs-5 col-md-5">
            {!! Form::label('upc', 'UPC: ', ['for' => 'name', 'class' => 'control-label']) !!}
            <div style="clear: both;"></div>
            {!! Form::text('upc', null, ['class' => 'form-control']) !!}
            {!! $errors->first('upc', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="input-group col-lg-offset-1 col-lg-5 col-xs-5 col-md-5">
            {!! Form::label('name', 'Wine Name: ', ['for' => 'name', 'class' => 'control-label']) !!}
            <div style="clear: both;"></div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>


        <div class="input-group col-lg-8 col-xs-8 col-md-8" style="padding-top:2em;">
            {!! Form::label('type_id', 'Wine Type: ', ['for' => 'name', 'class' => 'control-label']) !!}
            <div style="clear: both;"></div>

            <select id="add_wine_type_select" class="form-control" name="type_id">
    @if($wine_types)
                @foreach ($wine_types as $wine_type)
                    <option value="{{ $wine_type->id }}">{{ $wine_type->wine_type }}</option>
                @endforeach
    @endif
            </select>
            {{-- {{!! Form::number('type_id', null, ['class' => 'form-control']) !!} --}}
                {!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="input-group col-lg-offset-1 col-lg-2 col-xs-2 col-md-2" style="padding-top:2em;">
            {!! Form::label('button_type_id', 'add Type: ', ['for' => 'name', 'class' => 'control-label']) !!}
            <div style="clear: both;"></div>

            <button id="modalpopper" class="btn btn-success" onClick="return false;">Add Wine Type</button>
        </div>

    <div class="input-group col-lg-5 col-xs-5 col-md-5" style="padding-top:2em;">
        {!! Form::label('vintage', 'Vintage: ', ['class' => 'control-label']) !!}
        <div style="clear: both;"></div>
        {!! Form::number('vintage', null, ['class' => 'form-control']) !!}
        {!! $errors->first('vintage', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="input-group col-lg-offset-1 col-lg-5 col-xs-5 col-md-5" style="padding-top:2em;">
        {!! Form::label('cost', 'Cost: ', ['class' => 'control-label']) !!}
        <div style="clear: both;"></div>
        <input type="text" name="cost" class="form-control" id="cost" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$1,000,000.00">
        {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="input-group col-lg-5 col-xs-5 col-md-5" style="padding-top:2em;">
        {!! Form::label('regular_sell_price', 'Regular Sell Price: ', ['class' => 'control-label']) !!}
        <div style="clear: both;"></div>
        <input type="text" name="regular_sell_price" class="form-control" id="regular_sell_price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$1,000,000.00">

        {!! $errors->first('regular_sell_price', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="input-group col-lg-offset-1 col-lg-5 col-xs-5 col-md-5" style="padding-top:2em;">
        {!! Form::label('qty', 'Qty: ', ['class' => 'control-label']) !!}
        <div style="clear: both;"></div>
        {!! Form::number('qty', null, ['class' => 'form-control']) !!}
        {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
    </div>


    <div class="input-group col-lg-8 col-xs-8 col-md-8" style="padding-top:2em;">
        {!! Form::label('location_id', 'Location: ', ['for' => 'name', 'class' => 'control-label']) !!}
        <div style="clear: both;"></div>
        <select id="add_location_select" class="form-control" name="location_id">
            @if($wine_locations)
                @foreach ($wine_locations as $wine_location)
                    <option value="{{ $wine_location->id }}">{{ $wine_location->location }}</option>
                @endforeach
            @endif
        </select>
        {!! $errors->first('location_id', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="input-group col-lg-offset-1 col-lg-2 col-xs-2 col-md-2" style="padding-top:2em;">
        {!! Form::label('location_type_id', 'add Location: ', ['for' => 'name', 'class' => 'control-label']) !!}
        <div style="clear: both;"></div>

        <button id="modalLocationPop" class="btn btn-success" onClick="return false;">Add Location</button>
    </div>

<div style="clear:both;"> &nbsp; </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {{-- {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!} --}}
            <input class="btn btn-primary form-control" type="submit" value="Create" style="margin:0;padding:0">
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @include('includes.ajax_datatables')
    @include('includes.ajax_form_generator')

    @include('backend.wine.partials.addtype');
    @include('backend.wine.partials.addlocation');

    <script type="text/javascript">
        $('#modalpopper').click(function() {
            $('#addtypeModal').modal('show');
        });

        $('#modalLocationPop').click(function() {
            $('#addlocationModal').modal('show');
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

        $(document).ready(function() {
            var _token = $('meta[name="_token"]').attr('content');

            var wine_type_field_selectors = [ '#wine_type' ];
            var wine_location_field_selectors = ['#wine_location'];

            var form_objects = {
                    '#add_wine_type_select': {
                        'self_selector': '#add_wine_type_select',
                        'self_handler': 'select_list_success',
                        'db_return_fields': ['wine_type', 'id'],
                        'success_selector': '.print-addtype-success-msg',
                        'error_selector':   '.print-addtype-error-msg',
                        'success_function': 'printMsg',
                        'error_function': 'printMsg'

                    }
                    ,
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

            console.log(form_objects);

            $.each(form_objects, function(i, value) {
                //i is the selector here  ,  ex:  #add_wine_type_select
                console.log(i);

                //handler , function_parameters ,  db_return_fields  ,  success_error_selectors,  success_function,  error_function
                //$(selector).append($('<option>').text(data[i]['wine_type']).attr('value', data[i]['id']));
            });


            function ajaxResponse( data, form_object ){
                console.log(data);
                console.log(form_object);

                if($.isEmptyObject(data.error)){
                    if( form_object.hasOwnProperty('success_selector') && form_object.hasOwnProperty('success_function') ){
                        var fns = window[form_object['success_function']];
                        if (typeof fns === "function") {
                            fns( form_object['success_selector'], ['Success'] );
                        }
                    }else{
                        console.log("Found the property");
                    }

                    //Since it's a success...
                    if( form_object.hasOwnProperty('self_handler')){
                        console.log("Found " + form_object['self_handler']);
                        db_fields = '';
                        var fn = window[form_object['self_handler']];

                        if( form_object.hasOwnProperty('db_return_fields') ) db_fields = form_object['db_return_fields'];
                        if( form_object.hasOwnProperty('self_selector') ) {
                            if (typeof fn === "function"){
                                console.log("Handler is a function!!!");
                                fn( form_object['self_selector'], data, db_fields );
                            }
                        }
                    }
                }else{
                    if( form_object.hasOwnProperty('error_selector') && form_object.hasOwnProperty('error_function') ){
                        var fne = window[form_object['error_function']];
                        if (typeof fne === "function") fne( form_object['error_selector'], data );
                    }
                }

            }

            // AddType Ajax Sending of Data
            $('#addtype_button').click(function(e) {
                resetMsgs();
                e.preventDefault();
                var data = buildDataForAjax(_token, wine_type_field_selectors);
                var url = "{{config('app.url')}}/admin/add_wine_type";

                sendAjax( data, url ).success(function (result) {
                        ajaxResponse( result, form_objects['#add_wine_type_select'] );
                });
            });

            var wine_locations_field_selectors = [ '#wine_location' ];

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
    </script>

    @include('includes.partials.js.currency_converter');


@endsection