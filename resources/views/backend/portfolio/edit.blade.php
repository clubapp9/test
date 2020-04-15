@extends ('backend.layouts.master')

@section('content')

    <h1>Edit Portfolio</h1>
    <hr/>

    {!! Form::model($portfolio, [
        'method' => 'PATCH',
        'url' => ['admin/portfolio', $portfolio->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                {!! Form::label('first_name', 'First Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('first_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                {!! Form::label('last_name', 'Last Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
                {!! Form::label('dob', 'Dob: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('dob', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('SSN') ? 'has-error' : ''}}">
                {!! Form::label('ssn', 'Ssn: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('ssn', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('ssn', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('co_borrower_first_name') ? 'has-error' : ''}}">
                {!! Form::label('co_borrower_first_name', 'Co Borrower First Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('co_borrower_first_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('co_borrower_first_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('co_borrower_last_name') ? 'has-error' : ''}}">
                {!! Form::label('co_borrower_last_name', 'Co Borrower Last Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('co_borrower_last_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('co_borrower_last_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('co_borrower_SSN') ? 'has-error' : ''}}">
                {!! Form::label('co_borrower_ssn', 'Co Borrower Ssn: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('co_borrower_ssn', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('co_borrower_ssn', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                {!! Form::label('address', 'Address: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                {!! Form::label('city', 'City: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('city', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
                {!! Form::label('state', 'State: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('state', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('zip_code') ? 'has-error' : ''}}">
                {!! Form::label('zip_code', 'Zip Code: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('zip_code', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('original_creditor') ? 'has-error' : ''}}">
                {!! Form::label('original_creditor', 'Original Creditor: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('original_creditor', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('original_creditor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('original_account_numbers') ? 'has-error' : ''}}">
                {!! Form::label('original_account_numbers', 'Original Account Numbers: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('original_account_numbers', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('original_account_numbers', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('portfolio_name') ? 'has-error' : ''}}">
                {!! Form::label('portfolio_name', 'Portfolio Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('portfolio_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('portfolio_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('reference_name') ? 'has-error' : ''}}">
                {!! Form::label('reference_name', 'Reference Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('reference_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('reference_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('account_open_date') ? 'has-error' : ''}}">
                {!! Form::label('account_open_date', 'Account Open Date: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('date', 'account_open_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('account_open_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('first_delinquent_date') ? 'has-error' : ''}}">
                {!! Form::label('first_delinquent_date', 'First Delinquent Date: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('date', 'first_delinquent_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('first_delinquent_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('charge_off_date') ? 'has-error' : ''}}">
                {!! Form::label('charge_off_date', 'Charge Off Date: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('date', 'charge_off_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('charge_off_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('last_payment_date') ? 'has-error' : ''}}">
                {!! Form::label('last_payment_date', 'Last Payment Date: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('date', 'last_payment_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('last_payment_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('last_payment_amount') ? 'has-error' : ''}}">
                {!! Form::label('last_payment_amount', 'Last Payment Amount: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('last_payment_amount', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('last_payment_amount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('original_balance') ? 'has-error' : ''}}">
                {!! Form::label('original_balance', 'Original Balance: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('original_balance', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('original_balance', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('interest_percentage') ? 'has-error' : ''}}">
                {!! Form::label('interest_percentage', 'Interest Percentage: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('interest_percentage', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('interest_percentage', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('total_interest') ? 'has-error' : ''}}">
                {!! Form::label('total_interest', 'Total Interest: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('total_interest', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('total_interest', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('current_balance_with_interest') ? 'has-error' : ''}}">
                {!! Form::label('current_balance_with_interest', 'Current Balance With Interest: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('current_balance_with_interest', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('current_balance_with_interest', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('place_of_employment') ? 'has-error' : ''}}">
                {!! Form::label('place_of_employment', 'Place Of Employment: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('place_of_employment', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('place_of_employment', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('home_phone') ? 'has-error' : ''}}">
                {!! Form::label('home_phone', 'Home Phone: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('home_phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('home_phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('work_phone') ? 'has-error' : ''}}">
                {!! Form::label('work_phone', 'Work Phone: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('work_phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('work_phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('reference_phone') ? 'has-error' : ''}}">
                {!! Form::label('reference_phone', 'Reference Phone: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('reference_phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('reference_phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('last_contact_date') ? 'has-error' : ''}}">
                {!! Form::label('last_contact_date', 'Last Contact Date: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('date', 'last_contact_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('last_contact_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('status', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection