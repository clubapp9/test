<div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 has-modal" style="font-size:1em;background-color:white;">
    <h3>Notes <button id="addNoteButton">Add</button> </h3>
    <div id="note_add_entry" style="display:none;padding-bottom:1em;">

    </div>
    <section>

        <form name="search_update" id="search_update">
            <table id="example2" class="display cell-border" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Timestamp <!--<span id="ckbCheckAll" style="text-decoration:underline;">Check All</span>--></th>
                    <th>User</th>
                    <th>Comments</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($notes))
                    @foreach($notes as $note)
                        <tr>
                            <td> {{$note->created_at }} </td>
                            <td> {{$note->collector_id }} </td>
                            <td> {{$note->note }} </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </form>
    </section>
</div>

<script>
    //Being injected from FrontendController
    $(document).ready(function() {
        var account_id = $('#account_id').val();
        var _token = $('meta[name="_token"]').attr('content');

        //Notes Dynamic Form Generator
        var note_form_fields_array = [ 'note' ];
        var note_form_field_selectors = [ '#account_id', '#note' ];

        var alertHtml = generateAlertDiv( 'alert alert-success print-note-success' , 'none' );
        alertHtml += generateAlertDiv( 'alert alert-danger print-note-error' , 'none' );

        var note_html_form_fields = generateInputFields( note_form_fields_array, 40 );
        note_html_form_fields += '<button id="noteAddEntrySubmit">Save Note</button><br/>';

        $("#note_add_entry").html(alertHtml + note_html_form_fields);

        $('#addNoteButton').click(function(){
            $( "#note_add_entry" ).toggle( "slow" );
        });

        // Notes Ajax Sending of Data
        $('#noteAddEntrySubmit').click(function(e) {
            e.preventDefault();
            var data = buildDataForAjax(_token, note_form_field_selectors);
            var url = "{{config('app.url')}}/crud/add_note";
            sendAjax( data, url, '.print-note-success', printMsg , '.print-note-error', printMsg );
        });

    });
</script>