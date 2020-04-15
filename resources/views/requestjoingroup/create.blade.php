@extends('layouts.master')

@section('content')

    <h1>Create New Requestjoingroup</h1>
    <hr/>

    {!! Form::open(['url' => 'requestjoingroup', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('working_group_id') ? 'has-error' : ''}}">
                {!! Form::label('working_group_id', 'Working Group Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('working_group_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('working_group_id', '<p class="help-block">:message</p>') !!}
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