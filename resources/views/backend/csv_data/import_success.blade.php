@extends ('backend.layouts.master')
@section ('title', trans('menus.csvimport_success'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CSV Import Succeeded</div>


                    <div class="panel-body">
                        Data imported successfully.
                        <form>
                            @if(isset($sheet_name))

                                <input type="hidden" name="sheet_schema_id" id="sheet_schema_id" value="{{$sheet_schema_id}}">
                                <input type="hidden" name="csv_data_id" id="csv_data_id" value="{{$csv_data_id}}">
                                <p> Sheet Name: <input type="text" name="sheet_name" id="sheet_name" value="{{$sheet_name}}"></p>

                                <button style="btn btn-primary" id="rename" onClick="return false;">Rename</button>
                                <div id="rename_result" style="color:#ff0000;"></div>
                            @endif


                            <h3>Attach Date to all Data on this import :</h3>
                                <p>Date: <input type="text" id="datepicker"></p>

                                <button style="btn btn-primary" id="attach_dates" onClick="return false;">Attach Dates</button>
                                <div id="date_result" style="color:#ff0000;"></div>
                        </form>

                <!--
                        <a href="http://trackistry.local/admin/csvimport/view_data_table?sheet_schema_id=<?= $sheet_schema_id?>">View Data from Import</a>
                  -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $( function() {
            $( "#datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );

        var _token = $('meta[name="_token"]').attr('content');
        var sheet_schema_id = '';
        var csv_data_id = '';
        var sheet_name = '';
        var date = '';

        $('#attach_dates').click(function () {
            csv_data_id = $('#csv_data_id').val();
            date = $('#datepicker').val();

            $('#attach_dates').attr("disabled", true);
            $.ajax({
                url: "{{config('app.url')}}/admin/attach_dates",
                type: 'POST',
                data: {
                    _token: _token,
                    csv_data_id: csv_data_id,
                    date: date
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        console.log(data);
                        $('#date_result').text("Date successfully attached to all records in this sheet");
                    } else {
                        console.log(data);
                        $('#rename_result').text("ERROR: Date attach failed");
                    }
                }
            });
            $('#attach_dates').attr("disabled", false);
        });

        $('#rename').click(function () {
            sheet_schema_id = $('#sheet_schema_id').val();
            sheet_name = $('#sheet_name').val();

            $('#rename').attr("disabled", true);
            $.ajax({
                url: "{{config('app.url')}}/admin/rename_sheet",
                type: 'POST',
                data: {
                    _token: _token,
                    sheet_schema_id: sheet_schema_id,
                    sheet_name :  sheet_name
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        console.log(data);
                        $('#rename_result').text("Rename of sheet successful");
                    } else {
                        console.log(data);
                        $('#rename_result').text("ERROR: Rename of sheet failed");

                    }
                }
            });
            $('#rename').attr("disabled", false);
        });

    </script>
@endsection