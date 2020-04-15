<div class="modal fade" id="addtypeModal"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="padding:1em;">
            <div class="modal-header" style="border-bottom: 0px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Error or Success Messages dynamically updated via AJAX -->

            <div class="alert alert-success print-addtype-success-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="alert alert-danger print-addtype-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-5 offset-3">
                        <legend> <strong> Add Wine Type </strong></legend>
                        <!--<p class="text-muted">Maximun 26 Characters per field including spaces.</p>-->
                        <div class="w-100"></div>
                        <label>Wine Type: </label>
                        <input class="mb-1 form-control form-control-sm" id="wine_type" type="text" name="wine_type" value="">
                    </div>
                    <input class="btn btn-success float-right m-1" id="addtype_button" type="submit" name="Gen" value="Add Type"/>
                </div>
            </div>

            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>-->
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->