<!-- Add Note Modal -->
<div id="add-note-dialog" class="dialog" title="Add Note">
    <form action="http://192.168.0.209/#" method="post" accept-charset="utf-8" id="account_add_note"><div style="display:none">
            <input type="hidden" name="ci_csrf_token" value="0b0df449a08b72dba3b77c4e8e9efe72">
        </div>        <div class="flex-container">
            <div class="flex-item item-1 add-notes-fields form-group">
                <label><span>Note:</span>
                    <textarea class="form-control note-add-text-box notes-text-limit" name="note" style="width: 96%;"></textarea>
                    <div class="chars-left"></div>
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
            <input class="btn-clos-green btn-clos-small save-dialog modal-save" type="button" value="Save Note">
            <input class="btn-clos-lightgrey btn-clos-small close-dialog" type="button" value="Close">
        </div>
    </form>    </div>
