<!-- Add Address Modal -->
<div id="add-address-dialog" class="dialog" title="Add Address">
    <form action="http://192.168.0.209/#" method="post" accept-charset="utf-8" id="account_add_address"><div style="display:none">
            <input type="hidden" name="ci_csrf_token" value="0b0df449a08b72dba3b77c4e8e9efe72">
        </div>        <div class="flex-container">
            <div class="flex-item item-1 add-notes-fields form-group">

                <input class="window-width" type="hidden" value="300">
                <input type="hidden" name="submission_type" value="add">
                <input type="hidden" name="data_type" value="address">
                <input type="hidden" name="accountId" value="293960">
                <input type="hidden" name="user_id_stamp" value="PML">

                <label><span>Address 1:</span>
                    <input class="form-control" type="text" maxlength="35" name="addr1" value="">
                </label>
                <label><span>Address 2:</span>
                    <input class="form-control" type="text" maxlength="35" name="addr2" value="">
                </label>
                <label><span>City:</span>
                    <input class="form-control" type="text" maxlength="25" name="city" value="">
                </label>
                <label><span>State:</span>
                    <select name="state">
                        <option disabled="" selected="selected" value="">Select a state</option>
                        <optgroup label="State">
                            <option value="AL">Alabama - (AL)</option>
                            <option value="AK">Alaska - (AK)</option>
                            <option value="AZ">Arizona - (AZ)</option>
                            <option value="AR">Arkansas - (AR)</option>
                            <option value="CA">California - (CA)</option>
                            <option value="CO">Colorado - (CO)</option>
                            <option value="CT">Connecticut - (CT)</option>
                            <option value="DE">Delaware - (DE)</option>
                            <option value="DC">District Of Columbia - (DC)</option>
                            <option value="FL">Florida - (FL)</option>
                            <option value="GA">Georgia - (GA)</option>
                            <option value="HI">Hawaii - (HI)</option>
                            <option value="ID">Idaho - (ID)</option>
                            <option value="IL">Illinois - (IL)</option>
                            <option value="IN">Indiana - (IN)</option>
                            <option value="IA">Iowa - (IA)</option>
                            <option value="KS">Kansas - (KS)</option>
                            <option value="KY">Kentucky - (KY)</option>
                            <option value="LA">Louisiana - (LA)</option>
                            <option value="ME">Maine - (ME)</option>
                            <option value="MD">Maryland - (MD)</option>
                            <option value="MA">Massachusetts - (MA)</option>
                            <option value="MI">Michigan - (MI)</option>
                            <option value="MN">Minnesota - (MN)</option>
                            <option value="MS">Mississippi - (MS)</option>
                            <option value="MO">Missouri - (MO)</option>
                            <option value="MT">Montana - (MT)</option>
                            <option value="NE">Nebraska - (NE)</option>
                            <option value="NV">Nevada - (NV)</option>
                            <option value="NH">New Hampshire - (NH)</option>
                            <option value="NJ">New Jersey - (NJ)</option>
                            <option value="NM">New Mexico - (NM)</option>
                            <option value="NY">New York - (NY)</option>
                            <option value="NC">North Carolina - (NC)</option>
                            <option value="ND">North Dakota - (ND)</option>
                            <option value="OH">Ohio - (OH)</option>
                            <option value="OK">Oklahoma - (OK)</option>
                            <option value="OR">Oregon - (OR)</option>
                            <option value="PA">Pennsylvania - (PA)</option>
                            <option value="RI">Rhode Island - (RI)</option>
                            <option value="SC">South Carolina - (SC)</option>
                            <option value="SD">South Dakota - (SD)</option>
                            <option value="TN">Tennessee - (TN)</option>
                            <option value="TX">Texas - (TX)</option>
                            <option value="UT">Utah - (UT)</option>
                            <option value="VT">Vermont - (VT)</option>
                            <option value="VA">Virginia - (VA)</option>
                            <option value="WA">Washington - (WA)</option>
                            <option value="WV">West Virginia - (WV)</option>
                            <option value="WI">Wisconsin - (WI)</option>
                            <option value="WY">Wyoming - (WY)</option>
                        </optgroup>
                        <optgroup label="Other">
                            <option value="AS">American Samoa - (AS)</option>
                            <option value="GU">Guam - (GU)</option>
                            <option value="MP">Northern Mariana Islands - (MP)</option>
                            <option value="PR">Puerto Rico - (PR)</option>
                            <option value="UM">United States Minor Outlying Islands - (UM)</option>
                            <option value="VI">Virgin Islands - (VI)</option>
                            <option value="FM">Federated States of Micronesia - (FM)</option>
                            <option value="MH">Marshall Islands - (MH)</option>
                            <option value="PW">Palau - (PW)</option>
                            <option value="AA">Armed Forces Americas (except Canada) - (AA)</option>
                            <option value="AE">Armed Forces Europe, Canada, Middle East, Africa - (AE)</option>
                            <option value="AP">Armed Forces Pacific - (AP)</option>
                        </optgroup>
                    </select>                </label>
                <label><span>Zip:</span>
                    <input class="form-control" type="text" maxlength="10" name="zip" value="">
                </label>
            </div>
        </div>
        <div class="form-msg-box">
            <div class="form-saving field_working">
                <span>Saving...</span>
            </div>
            <div class="form-error field_error">
            </div>
        </div>
        <div class="button-container">
            <input class="btn-clos-green btn-clos-small save-dialog modal-save" type="button" value="Save Address">
            <input class="btn-clos-lightgrey btn-clos-small close-dialog" type="button" value="Close">
        </div>
    </form>    </div>