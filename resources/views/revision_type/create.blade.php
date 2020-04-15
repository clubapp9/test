@extends('layouts.master')

@section('content')

    <h1>Create New Revision_type</h1>
    <hr/>

    {!! Form::open(['url' => 'revision_type', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('revision_type') ? 'has-error' : ''}}">
                {!! Form::label('revision_type', 'Revision Type: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('revision_type', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('revision_type', '<p class="help-block">:message</p>') !!}
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