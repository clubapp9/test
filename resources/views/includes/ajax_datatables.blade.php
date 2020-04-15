<script type="text/javascript">
    function resetMsgs(){
        $(".print-error-msg").find("ul").html('');
        $(".print-success-msg").find("ul").html('');
        $(".print-error-msg").css('display','none');
        $(".print-success-msg").css('display','none');
    }
    function printMsg (selector, msg) {
        $(selector).find("ul").html('');
        $(selector).css('display','block');
        $.each( msg, function( key, value ) {
            $(selector).find("ul").append('<li>'+value+'</li>');
        });
    }

    /**  function dynamically build data object to send to AJAX  /  Similar to serialize Form
     * example:    var form_fields = [ "#debt_id", "#ssn" ];
     *
     * buildDataForAjax( csrf_token, form_fields );
     *
     * @param csrf_token
     * @param form_selectors
     */
    function buildDataForAjax( csrf_token, form_selectors ){
        var fLen, i;
        var data = {};
        data._token = csrf_token;

        fLen = form_selectors.length;
        for (i = 0; i < fLen; i++) {
            var current_field_value = $(form_selectors[i]).val();

            var field_name = form_selectors[i];
            field_name = field_name.replace(/\./g, "");
            field_name = field_name.replace(/#/g, "");

            //Dynamically create all the form fields to send via AJAX and attach values from the fields
            // using jQuery selectors.
            data[field_name] = current_field_value;
        }

        return data;
    }

     /**  sendAJAX
     *
     * @param data  - should be a javascript Object { 'value', 'value2' }
     * @param url -  http://vintvine.local/search*
      *
     * @return return ajax call response to be handled
     */
    function sendAjax( field_data, url ){
            return $.ajax({
                url: url,
                type:'POST',
                data: field_data,
                success: function(data) {
                }
            });
    }

    /** handleAjaxResponse
     *
     * @param data
     * @param handler_object
     */
    function handleAjaxData(data, handler_object ){
        if($.isEmptyObject(data.error)){
            console.log(data);
            success_function(  success_selector, data );
        }else{
            console.log(data);
            error_function( error_selector, data.error) ;
        }
    }

</script>