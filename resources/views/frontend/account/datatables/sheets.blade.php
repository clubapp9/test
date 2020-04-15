<div class="col-lg-6 col-md-6" style="font-size:1em;background-color:white;">
    <h3>Sheet View </h3>
    <div id="phone_add_entry" style="display:none;padding-bottom:1em;">

    </div>
    <section>

        <?php
            $sheet_definition = json_decode($sheet_definition, true);

            $columns = count($sheet_definition);
            ?>

        <form name="search_update" id="search_update">
            <input type="hidden" name="action" value="update_action">
            <table id="example" class="display cell-border" cellspacing="0" width="100%">
                <thead>
                <tr>
                    @if(!empty($sheet_definition))
                        @foreach($sheet_definition as $column)
                            <th> {{$column }} </th>
                        @endforeach
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(!empty($sheet_data))
                    @foreach($sheet_data as $data)
                        <tr>
                            <?php
                                if(!empty($sheet_definition)){
                                    foreach($sheet_definition as $column)
                                        {
                                            echo "<td>" . $data[strtolower($column)] . "</td>";
                                        }
                                }
                            ?>

                            <?php

                            ?>

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