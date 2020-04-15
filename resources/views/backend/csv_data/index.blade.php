@extends ('backend.layouts.master')
@section ('title', trans('menus.csvimport'))

@section('content')


    <div class="container" id="schema_definition">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Trackistry CSV Schema</div>

                    <div class="panel-body">

                        <form class="form-horizontal" id="form_schema_definition" method="POST" action="{{ route('admin.csvimport.createSheet') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <label>Sheet Name:</label>  <input type="textbox" name="sheet_name">


                            <!--<label>Sheet Description(optional):</label>  <textarea name="sheet_description">  </textarea>

                            -->
                            <br><br>
                            <p>Click the button to add new Column to Sheet Schema!</p>
                            <div id="main">
                                <input type="button" id="btAdd" value="Add Column" class="bt" />
                                <input type="button" id="btRemove" value="Remove Column" class="bt" />
                                <input type="button" id="btRemoveAll" value="Remove All" class="bt" /><br />
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            var iCnt = 0;

            var container = $(document.createElement('div')).css({
                padding: '5px', margin: '20px', width: '300px', border: '1px dashed',
                borderTopColor: '#999', borderBottomColor: '#999',
                borderLeftColor: '#999', borderRightColor: '#999'
            });

            $('#btAdd').click(function() {
                if (iCnt <= 40) {

                    iCnt = iCnt + 1;

                    // ADD TEXTBOX.
                    $(container).append('<div id=tb' + iCnt + '><label>Column ' + iCnt + ': &nbsp;</label>' +
                    '<input type=text name="columns[]" class="input" value="" /> </div>');


                    // SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.
                    if (iCnt == 1) {
                        var divSubmit = $(document.createElement('div'));
                        $(divSubmit).append('<input type="submit" class="bt"' +
                        'onclick="GetTextValue()"' +
                        'id=btSubmit value="Create Sheet Definition" />');
                    }

                    // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                    $('#main').after(container, divSubmit);
                }
                // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
                // (20 IS THE LIMIT WE HAVE SET)
                else {
                    $(container).append('<label>Reached the limit</label>');
                    $('#btAdd').attr('class', 'bt-disable');
                    $('#btAdd').attr('disabled', 'disabled');
                }
            });

            // REMOVE ONE ELEMENT PER CLICK.
            $('#btRemove').click(function() {
                if (iCnt != 0) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; }

                if (iCnt == 0) {
                    $(container)
                            .empty()
                            .remove();

                    $('#btSubmit').remove();
                    $('#btAdd')
                            .removeAttr('disabled')
                            .attr('class', 'bt');
                }
            });

            // REMOVE ALL THE ELEMENTS IN THE CONTAINER.
            $('#btRemoveAll').click(function() {
                $(container)
                        .empty()
                        .remove();

                $('#btSubmit').remove();
                iCnt = 0;

                $('#btAdd')
                        .removeAttr('disabled')
                        .attr('class', 'bt');
            });
        });

        // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
        var divValue, values = '';

        function GetTextValue() {
            $(divValue)
                    .empty()
                    .remove();

            values = '';

            $('.input').each(function() {
                divValue = $(document.createElement('div')).css({
                    padding:'5px', width:'200px'
                });
                values += this.value + '<br />'
            });

            $(divValue).append('<p><b>Your selected values</b></p>' + values);
            $('.form_schema_definition').append(divValue);
        }
    </script>




    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Trackistry Import CSV</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.csvimport.import_parse') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if(!empty($random_hidden_value))
                                <input type="hidden" value="{{$random_hidden_value}}" name="random_value">
                            @endif
                            <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                                <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>

                                <div class="col-md-6">
                                    <input id="csv_file" type="file" class="form-control" name="csv_file" required>

                                    @if ($errors->has('csv_file'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="sheet_schema_list" class="col-md-4 control-label">Sheet Schema to Use</label>

                                <div class="col-md-6">
                                    <select name="sheet_schema_id" id="sheet_schema_list" class="form-control" required>
                                        <option value="none" selected>None</option>
                                        @if(!empty($sheet_schema))
                                            @foreach($sheet_schema as $schema)
                                        <option value="{{$schema->id}}" id="sheet_schema_list_item">{{$schema->name }}
                                        </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <!--<input type="checkbox" name="header"> File contains header row?-->
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Parse CSV
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
