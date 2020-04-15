<!-- Add Phone Number Modal -->
<div id="add-phone-number-dialog" class="dialog" title="Add Phone Number">
    <form action="http://192.168.0.209/#" method="post" accept-charset="utf-8" id="account_add_phone_number"><div style="display:none">
            <input type="hidden" name="ci_csrf_token" value="0b0df449a08b72dba3b77c4e8e9efe72">
        </div>        <div class="flex-container">
            <div class="flex-item item-1 add-phone-number-fields form-group">

                <input class="window-width" type="hidden" value="300">
                <input type="hidden" name="submission_type" value="add">
                <input type="hidden" name="data_type" value="phone">
                <input type="hidden" name="accountId" value="293960">
                <input type="hidden" name="user_id_stamp" value="PML">

                <label><span>Phone Number</span>
                    <input class="form-control" type="text" maxlength="14" name="phone" value="">
                </label>
                <label><span>Description</span>
                    <input class="form-control" type="text" maxlength="14" name="descr" value="">
                </label>
                <label><span>Status</span>
                    <input class="form-control" type="text" maxlength="1" name="status" value="">
                </label>
            </div>
        </div>
        <div class="form-msg-box">
            <div class="form-saving field_working">
                <span>Saving...</span>
            </div>
            <div class="form-error field_error">
                <span>An error has occurred.</span>
            </div>
        </div>
        <div class="button-container">
            <input class="btn-clos-green btn-clos-small save-dialog modal-save" type="button" value="Save Phone Number">
            <input class="btn-clos-lightgrey btn-clos-small close-dialog" type="button" value="Close">
        </div>

    </form>    </div>
<!-- Edit Phone Number Modal -->
<script id="edit-phone-number-template" type="text/x-handlebars-template">

    <div id="edit-phone-number-dialog" class="dialog" title="Edit Phone Number">
        <div class="flex-container">
            <div class="flex-item item-1 add-phone-number-fields form-group">
                <label><span>Phone Number</span>
                    <input class="form-control" type="text" maxlength="14" name="phone" value="{{phone_number}}" />
                </label>
                <label><span>Description</span>
                    <input class="form-control" type="text" maxlength="14" name="descr" value="{{description}}" />
                </label>
                <label><span>Status</span>
                    <input class="form-control" type="text" maxlength="1" name="status" value="{{status}}" />
                </label>
                <input type="hidden" class="item-no" name="itemno" value="{{ item_no }}">
            </div>
        </div>
    </div>

</script>