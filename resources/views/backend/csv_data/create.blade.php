@extends('layouts.master')

@section('content')

    <h1>Create New Csv_datum</h1>
    <hr/>

    {!! Form::open(['url' => 'csv_data', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('csv_filename') ? 'has-error' : ''}}">
                {!! Form::label('csv_filename', 'Csv Filename: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('csv_filename', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('csv_filename', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('csv_header') ? 'has-error' : ''}}">
                {!! Form::label('csv_header', 'Csv Header: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('csv_header', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('csv_header', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('csv_header', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('csv_data') ? 'has-error' : ''}}">
                {!! Form::label('csv_data', 'Csv Data: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('csv_data', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('csv_data', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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