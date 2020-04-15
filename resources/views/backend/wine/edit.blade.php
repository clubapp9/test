@extends('backend.layouts.master')

@section('content')

    <h1>Edit Wine</h1>
    <hr/>

    {!! Form::model($wine, [
        'method' => 'PATCH',
        'route' => ['admin.wine.update', $wine->id],
        'class' => 'form-inline'
    ]) !!}
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
        {!! Form::number('type_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="input-group col-lg-offset-1 col-lg-2 col-xs-2 col-md-2" style="padding-top:2em;">
        {!! Form::label('type_id', 'add Type: ', ['for' => 'name', 'class' => 'control-label']) !!}
        <div style="clear: both;"></div>

        <button id="modalpopper" class="btn-success" onClick="return false;">Add Wine Type</button>
    </div>

    <div class="input-group col-lg-5 col-xs-5 col-md-5" style="padding-top:2em;">
        {!! Form::label('vintage_id', 'Vintage Id: ', ['class' => 'control-label']) !!}
        <div style="clear: both;"></div>
        {!! Form::number('vintage_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('vintage_id', '<p class="help-block">:message</p>') !!}
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
        {!! Form::label('type_id', 'Location: ', ['for' => 'name', 'class' => 'control-label']) !!}
        <div style="clear: both;"></div>
        {!! Form::number('type_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('location_id', '<p class="help-block">:message</p>') !!}
    </div>

    {{-- {!! Form::open(['route' => 'admin.wine.store', 'method' => 'PATCH', 'class' => 'form-horizontal']) !!} --}}


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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

    <script type="text/javascript">
        // Jquery Dependency

        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") { return; }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = "$" + left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = "$" + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

        $('#modalpopper').click(function() {
            $('#orderModal').modal('show');
        });
    </script>

    <div class="modal fade" id="orderModal"  tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="padding:1em;">
                <div class="modal-header" style="border-bottom: 0px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <!-- Error or Success Messages dynamically updated via AJAX -->

                <div class="alert alert-success print-success-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5 offset-3">
                            <legend> <strong> Add Wine Type </strong></legend>
                            <!--<p class="text-muted">Maximun 26 Characters per field including spaces.</p>-->
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="_csrfToken" value="">
                            <div class="w-100"></div>
                            <label>Name: </label>
                            <input class="mb-1 form-control form-control-sm" type="text" name="wine_type" value="">
                        </div>
                        <input class="btn btn-success float-right m-1" type="submit" name="Gen" value="Add Type"/>
                    </div>
                </div>

                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection