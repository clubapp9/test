@extends ('backend.layouts.master')
@section ('title', trans('menus.csvimport_fields'))
@section('content')
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"
            integrity="sha256-0vBSIAi/8FxkNOSKyPEfdGQzFDak1dlqFKBYqBp1yC4="
            crossorigin="anonymous"></script>
    {{-- @include('backend.csv_data.popover') --}}

                    <div class="panel-heading" style="padding-top:3em;">CSV Import</div>

                        <form  method="POST" action="{{ route('admin.csvimport.import_process') }}" style="padding-bottom:500px;">
                            {{ csrf_field() }}
                            <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}" />

                            <table class="table">
                                <?php
                                $i=0;
                                ?>
                                @if (isset($csv_header_fields))
                                    <tr>
                                        @foreach ($csv_header_fields as $csv_header_field)
                                            <th>{{ $csv_header_field }}</th>
                                            <?php if($i++ % 3 == 0){?>
                                            <?php

                                            } ?>
                                        @endforeach
                                    </tr>
                                @endif
                                @foreach ($imported_values as $row)
                                    <tr>
                                        @foreach ($row as $key => $value)
                                            <td data-id="{{ $key }}" data-entry="{{ $value }}">
                                                <div style="col-xs-12 col-sm-6 col-md-3 ">{{ $value }}</div>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                    @if (isset($actual_sheet))
                                <tr>
                                    @foreach ($csv_data[0] as $key => $value)
                                        <td>
                                            <select name="fields[{{ $key }}]">
                                                @foreach ($actual_sheet as $db_field)
                                                    <option value="{{ (\Request::has('header')) ? $db_field : $loop->index }}"
                                                    @if (strtolower($key) === strtolower($db_field)) selected @endif>{{ $db_field }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    @endforeach
                                </tr>
                                    @endif
                            </table>

                         <div>

                        </div>
                            <button type="submit" class="btn btn-primary">
                                Continue ...
                            </button>

                            @if (isset($sheet_schema_id))
                                <input type="hidden" name="sheet_schema_id" value="{{$sheet_schema_id}}">
                            @endif

                            @if (isset($csv_data_id))
                                <input type="hidden" name="csv_data_id" value="{{$csv_data_id}}">
                            @endif

                        </form>

    <div id="Normal">
        <a class="btn btn-primary draggable">Popover</a>
    </div>

<style type="text/css">
    body{
        overflow-x: scroll;
        overflow-y: scroll;
        overflow: scroll;
        background-color:#ecf0f5;
    }
    .wrapper{
        overflow: visible;
    }
    td{
        padding: 1px 0px;
        border-width: 2px;
        border-style: inset;
        border-color: initial;
        border-image: initial;
        border-top: 1px;
    }
    </style>

    <div id="metadataForm" style="padding-top:1em;margin-top:1em;">

        <form action="{{config('app.url')}}/ajax/" onSubmit="return false;" id="popForm" method="get">
            <div>
                <strong id="current_value"></strong> <br><br>


                <label for="agent_number"> Agent Number:</label>
                <input type="text" name="agent_number" id="agent_number" class="form-control input-md">

                <label for="sub_producer_number"> Sub Producer Number :</label>
                <input type="text" name="sub_producer_number" id="sub_producer_number" class="form-control input-md">

                <label for="column_name">FieldName/Column Name:</label>
                <input type="text" name="column_name" id="column_name" value="" class="form-control input-md">
                <label for="name">Short Name:</label>
                <input type="text" name="name" id="short_name" class="form-control input-md">
                <label for="custom_name">Custom Name:</label>
                <input type="text" name="custom_name" id="custom_name" class="form-control input-md">

                <label for="denger">Data Type:</label>
                <select name="data_type" id="data_type" class="form-control input-md">
                    <option value="1">Text</option>
                    <option value="2">Numeric</option>
                    <option value="3">Date</option>
                    <option value="4">Percentage</option></select>

                <label for="denger">Frequency:</label>
                <select name="frequency" id="frequency" class="form-control input-md">
                    <option value="1">Daily</option>
                    <option value="2">Weekly</option>
                    <option value="3">Monthly</option>
                    <option value="4">Yearly</option></select>

                <button type="button" id=cancel" class="btn btn-danger" data-loading-text="Canceled"><em class="icon-ok"></em> Cancel</button>
                <button type="button" id="save_button" class="btn btn-primary" data-loading-text="Sending info.." onClick="return false;"><em class="icon-ok"></em> Save</button>
            </div>
        </form>
        <div id="result" style="color:#ff0000;"></div>
    </div>

    <script type="text/javascript">
        var _token = $('meta[name="_token"]').attr('content');
        var ajax_requesting = false;
        var tdData = '';
        var column = '';
        var data_type = '';
        var frequency = '';
        var column_name = '';
        var short_name = '';
        var custom_name = '';

        $(".draggable").popover({
            placement: 'left',
            title: 'Metadata Form',
            html: true,
            content: $('#metadataForm').html()

        }).on('click', function () {
        }).popover('show');
        $('.popover').draggable();

        $(".table").on("click", "td", function() {
            tdData = $(this).attr('data-entry');
            column = $(this).attr('data-id');
            data_type = $('#data_type').val();
            frequency = $('#frequency').val();
            column_name = $('#column_name').val();
            short_name = $('#short_name').val();
            custom_name = $('#custom_name').val();
            console.log(column_name + " : " + data_type);
            $("#current_value").text("Current value: " + tdData + " id: " + column);
        });


        $('#save_button').click(function () {
            if (column == '')
            {
                alert("No column selected");
                return;
            }

            data_type = $('#data_type').val();
            frequency = $('#frequency').val();
            column_name = $('#column_name').val();
            short_name = $('#short_name').val();
            custom_name = $('#custom_name').val();

console.log(column);

            $('#save_button').attr("disabled", true);
            $.ajax({
                url: "{{config('app.url')}}/admin/assign_value_attributes",
                type: 'POST',
                data: {
                    _token: _token,
                    column_id: column,
                    column_current_value: tdData,
                    data_type :  data_type,
                    frequency : frequency,
                    column_name : column_name,
                    short_name : short_name,
                    custom_name : custom_name
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        console.log(data.success);
                        $('#result').text( "Record Saved/Updated successfully." );
                    } else {
                        console.log(data);
                        $('#result').text( "Error attempting to save/update data." );

                    }
                }
            })

            $('#save_button').attr("disabled", false);
        });

    </script>
@endsection
