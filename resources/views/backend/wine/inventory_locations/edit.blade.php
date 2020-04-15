@extends('backend.layouts.master')

@section('content')

    <h1>Edit Wine_location</h1>
    <hr/>

    {!! Form::model($wine_location, [
        'method' => 'PATCH',
        'url' => ['wine_locations', $wine_location->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('wine_location') ? 'has-error' : ''}}">
                {!! Form::label('wine_location', 'Wine Location: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('wine_location', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('wine_location', '<p class="help-block">:message</p>') !!}
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