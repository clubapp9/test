<div class="col-lg-6 col-md-6" style="font-size:1em;background-color:white;">
    <h3>Phone Numbers <button id="addPhoneButton">Add</button>  or <button id="addRow">Add Test</button> </h3>
    <div id="phone_add_entry" style="display:none;padding-bottom:1em;">

    </div>
    <section>


        <form name="search_update" id="search_update">
            <input type="hidden" name="action" value="update_action">
            <table id="example" class="display cell-border" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Phone <!--<span id="ckbCheckAll" style="text-decoration:underline;">Check All</span>--></th>
                    <th>Description</th>
                    <th>Local Time</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($phones))
                    @foreach($phones as $phone)
                        <tr>
                            <td> {{$phone->phone }} </td>
                            <td> {{$phone->description }} </td>
                            <td> {{$phone->created_at }} </td>
                            <td> {{$phone->status }} </td>
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
        var phone_form_fields_array = [ 'phone', 'description', 'status' ];
        var phone_form_field_selectors = [ '#account_id', '#phone', '#description', '#status' ];

        var alertHtml = generateAlertDiv( 'alert alert-success print-phone-success' , 'none' );
        alertHtml += generateAlertDiv( 'alert alert-danger print-phone-error' , 'none' );

        var phone_html_form_fields = generateInputFields( phone_form_fields_array, 40 );
        phone_html_form_fields += '<button id="phoneAddEntrySubmit">Save Phone</button><br/>';

        $("#phone_add_entry").html(alertHtml + phone_html_form_fields);

        $('#addPhoneButton').click(function(){
            $( "#phone_add_entry" ).toggle( "slow" );
        });

        // Notes Ajax Sending of Data
        $('#phoneAddEntrySubmit').click(function(e) {
            e.preventDefault();
            var data = buildDataForAjax(_token, phone_form_field_selectors);
            var url = "{{config('app.url')}}/crud/add_phone";
            sendAjax( data, url, '.print-phone-success', printMsg , '.print-phone-error', printMsg );
        });

    });
</script>