@extends('layouts.master')

@section('content')

    <h1>Edit Revision_type</h1>
    <hr/>

    {!! Form::model($revision_type, [
        'method' => 'PATCH',
        'url' => ['revision_type', $revision_type->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('revision_type') ? 'has-error' : ''}}">
                {!! Form::label('revision_type', 'Revision Type: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('revision_type', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('revision_type', '<p class="help-block">:message</p>') !!}
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