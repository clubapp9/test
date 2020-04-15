@extends('layouts.master')

@section('content')

    <h1>Edit Workinggroup</h1>
    <hr/>

    {!! Form::model($workinggroup, [
        'method' => 'PATCH',
        'route' => ['workinggroups.update', $workinggroup->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('moderator_id') ? 'has-error' : ''}}">
                {!! Form::label('moderator_id', 'Moderator Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('moderator_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('moderator_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('about') ? 'has-error' : ''}}">
                {!! Form::label('about', 'About: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('about', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
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