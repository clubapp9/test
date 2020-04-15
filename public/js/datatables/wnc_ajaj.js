//Refresh/Load DataTable(s) on Page
//table_select must include .  or #  for class or id
function refreshDataTable (table_selector){

        jQuery("#example tbody").html('');
        
        var data = {
            'action': 'search_action',
            'error_type': mandrill_error_type,    // Create data object
            'start_date': start_date,
            'end_date': end_date,
            'controller': 'WNC_Mandrill_Cleaner',
            'wnc_aiowz_tkn': noner
        };
        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        jQuery.post(ajax_object.ajax_url, data, function (response) {

            thisSession = JSON.parse(response);

            //Error result?
            if (thisSession.hasOwnProperty('errors')) {
                for (var obj in thisSession){
                    var errrors = document.getElementById("search_error");
                    errors.innerHTML += data[obj].id+ "is"+data[obj].class + "<br/>";
                }
             }

             if (thisSession.hasOwnProperty('data_table')) {
                 var oTable = jQuery('#example').dataTable();

                 // Immediately 'nuke' the current rows (perhaps waiting for an Ajax callback...)
                 oTable.fnClearTable();

                 for (var key in thisSession['data_table']){
                     jQuery('#example').dataTable().fnAddData( [
                     '<input type="checkbox" class="checkBoxClass" name="check[]" value="' +  thisSession['data_table'][key].email + '" checked>Remove',
                         thisSession['data_table'][key].ts,
                         thisSession['data_table'][key].subject,
                         thisSession['data_table'][key].state,
                         thisSession['data_table'][key].email,
                         thisSession['data_table'][key].sender ] );
                 }

                 for (var nonce in thisSession['nonce']){
                     jQuery('#search_update').find('input[name="wnc_aiowz_tkn_update"]').val(thisSession['nonce']);
                 }

                 jQuery("#data_table_header").text('DataTable for ' + mandrill_error_type + ' from ' + start_date + ' to ' + end_date);
                 jQuery('#example').dataTable();
             }
        });
}


/**
 * Parses json array / object and displays error(s) within the dom element specified
 * @param obj json object
 * @param domElement Class/ID name of element to display errors within
 */
function displayJson( obj, domItem ) {
  for( node in obj ) {
    displayStr += node;
  }
    domItem.innterHTML = displayStr;
}

//Check all checkboxes on update form
jQuery(document).ready(function () {
    jQuery("#ckbCheckAll").click(function () {
            jQuery("#search_update input:checkbox").attr('checked', true);
    });
});