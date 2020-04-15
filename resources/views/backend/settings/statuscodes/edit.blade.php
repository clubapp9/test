@extends ('backend.layouts.master')

@section('content')

    <h1>Edit Statuscode</h1>
    <hr/>

    {!! Form::model($statuscode, [
        'method' => 'PATCH',
        'url' => ['admin/settings/statuscodes', $statuscode->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('status_code') ? 'has-error' : ''}}">
                {!! Form::label('status_code', 'Status Code: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('status_code', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('status_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('description', 'Description: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
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