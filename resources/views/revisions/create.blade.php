@extends('layouts.master')

@section('content')

    <h1>Create New Revision</h1>
    <hr/>

    {!! Form::open(['url' => 'revisions', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('revision_type_id') ? 'has-error' : ''}}">
                {!! Form::label('revision_type_id', 'Revision Type Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('revision_type_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('revision_type_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('action_log') ? 'has-error' : ''}}">
                {!! Form::label('action_log', 'Action Log: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('action_log', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('action_log', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
                {!! Form::label('notes', 'Notes: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
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