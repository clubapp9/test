<div class="col-lg-6 col-md-6" style="font-size:1em;background-color:white;">
    <div class="col-lg-5 col-md-5">
        <div style="float:left;">Name 1: &nbsp;&nbsp;</div>
        <div style="float:left;">
            <input type="text" value="{{$account_result[0]->first_name}} {{$account_result[0]->last_name}}"></div>

    </div>

    <div class="col-lg-5 col-md-5" style="padding-top:.5em;">
        <div style="float:left;">Name 2:&nbsp;&nbsp;</div>
        <div style="float:left;">
            <input type="text" value="{{$account_result[0]->co_borrower_first_name}} {{$account_result[0]->co_borrower_last_name}}"></div>

    </div>


    <div class="col-lg-5 col-md-5">
        <div style="float:left;">SSN 1:&nbsp;&nbsp;</div>
        <div style="float:left;">
            <input type="text" value="{{$account_result[0]->ssn}}"></div>

    </div>

    <div class="col-lg-5 col-md-5" style="padding-top:.5em;">
        <div style="float:left;">SSN 2:&nbsp;&nbsp;</div>
        <div style="float:left;">
            <input type="text" value="{{$account_result[0]->co_borrower_ssn}}"></div>

    </div>



    <div class="col-lg-5 col-md-5">
        <div style="float:left;">Status:&nbsp;&nbsp;</div>
        <div style="float:left;">
            <input type="text" value="{{$account_result[0]->status}}"></div>

    </div>

    <div class="col-lg-5 col-md-5" style="padding-top:.5em;">
        <div style="float:left;">Worklist:&nbsp;&nbsp;</div>
        <div style="float:left;">
            <input type="text" value="{{$account_result[0]->co_borrower_ssn}}"></div>

    </div>
    <div class="col-lg-10 col-md-5" style="padding-top:.5em;">
        <div style="float:left;">Warning:&nbsp;&nbsp;</div>
        <div style="float:left;">
            <input type="text" value=""></div>

    </div>
    <div class="col-lg-10 col-md-5" style="padding-top:.5em;">
        <a href="#"><img src="{{URL::asset('img/buttons/save.png')}}"></a>
        <a href="#"><img src="{{URL::asset('img/buttons/cancel.png')}}"></a>
        <br/>
        <a href="#"><img src="{{URL::asset('img/buttons/files.png')}}"></a>
        <a href="#"><img src="{{URL::asset('img/buttons/cards.png')}}"></a>
        <a href="#"><img src="{{URL::asset('img/buttons/view_payments_receipts.png')}}"></a>
        <a href="#"><img src="{{URL::asset('img/buttons/add_payment.png')}}"></a>
        <a href="#"><img src="{{URL::asset('img/buttons/similar_accounts.png')}}"></a>
    </div>
</div>

<div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1" style="background-color:white;">
    <table style="padding:1px;border-collapse: separate;border-spacing: 6px;width:100%;">
        <tr>
            <td colspan="2">
                <strong>Original Client</strong> &nbsp &nbsp;
            </td>
            <td>
                {{$account_result[0]->original_creditor}}
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <strong>Debt Description</strong> &nbsp &nbsp;</td>
        </tr>

        <tr>
            <td colspan="2">
                <strong>Reference #</strong> &nbsp &nbsp;</td>
            <td>{{$account_result[0]->reference_phone}}</td>
        </tr>
        <tr>
            <td >
                <strong>Service Date</strong> &nbsp &nbsp;</td>
            <td></td>

            <td >
                <strong>Client ID</strong> &nbsp &nbsp;</td>
            <td>{{$account_result[0]->csv_data_file_id}}</td>
        </tr>

        <tr>
            <td >
                <strong>Delinquency Date</strong> &nbsp &nbsp;</td>
            <?php
            $phpdate = strtotime($account_result[0]->first_delinquent_date);
            $php_timestamp_date = date("m-d-Y", $phpdate);
            ?>
            <td>{{$php_timestamp_date}}</td>

            <td>
                <strong>Original Principal</strong> &nbsp &nbsp;</td>
            <td>{{$account_result[0]->original_balance}}</td>
        </tr>

        <tr>
            <td>
                <strong>ChargeOff Date</strong> &nbsp &nbsp;</td>
            <?php
            $phpdate = strtotime($account_result[0]->charge_off_date);
            $php_timestamp_date = date("m-d-Y", $phpdate);
            ?>
            <td>{{$php_timestamp_date}}</td>

            <td>
                <strong>Last Payment Date</strong> &nbsp &nbsp;</td>
            <?php
            $phpdate = strtotime($account_result[0]->last_payment_date);
            $php_timestamp_date = date("m-d-Y", $phpdate);
            ?>
            <td>{{$php_timestamp_date}}</td>
        </tr>

        <tr>
            <td>
                <strong>Interest Percentage</strong> &nbsp &nbsp;</td>
            <td>{{$account_result[0]->interest_percentage}}</td>

            <td>
                <strong>Current Bal W/ Interest</strong> &nbsp &nbsp;</td>
            <td>{{$account_result[0]->current_balance_with_interest}}</td>
        </tr>

        <tr>
            <td>
                <strong>Total Interest</strong> &nbsp &nbsp;</td>
            <td>{{$account_result[0]->total_interest}}</td>

            <td>
                <strong>Last Payment Amount</strong> &nbsp &nbsp;</td>
            <td>{{$account_result[0]->last_payment_amount}}</td>
        </tr>

        <tr>
            <td>
                <strong>Last Contact</strong> &nbsp &nbsp;</td>
            <?php
            $phpdate = strtotime($account_result[0]->last_contact_date);
            $php_timestamp_date = date("m-d-Y", $phpdate);
            ?>
            <td>{{$php_timestamp_date}}</td>

            <td>
                <strong>Other Field</strong> &nbsp &nbsp;</td>
            <td>Test</td>
        </tr>

    </table>
</div>
