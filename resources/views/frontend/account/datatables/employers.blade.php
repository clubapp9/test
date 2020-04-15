<div class="col-lg-6 col-md-6" style="font-size:1em;">
    <h3>Employers</h3>
    <section>
        </section>
    </div>


<script>
    //Being injected from FrontendController
    /*$(document).ready(function() {
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

    });*/
</script>