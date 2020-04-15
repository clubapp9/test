<script type="text/javascript">

    /** generateInputFields is limited to <input type="text"> fields
     *
     * @param fields
     */
    function generateInputFields( fields, size ){
        var fLen = fields.length;
        var i;
        var field_html_gen = '';

        var div = '<div class="DynamicEntryForms">';

        for (i = 0; i < fLen; i++) {
            field_html_gen += '<label>'+ capitalizeFirstLetter(fields[i])+':<input type="text" value="" name="'+ fields[i] + '" id="'+ fields[i] + '" size="'+ size +'"></label>';
        }

        var div_end = '</div>';

        return div + field_html_gen + div_end;
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    /** generateAlertDiv
     * Something similar to :
     *         <div class="alert alert-success print-success-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
     * @param className
     * @returns {*}
     */
    function generateAlertDiv( className, defaultDisplay ) {
        var generated_html;
        generated_html = '<div class="' + className + '" style="display:' + defaultDisplay + ';">';
        generated_html += '<ul></ul>';
        generated_html += '</div>';

        return generated_html;
    }

</script>