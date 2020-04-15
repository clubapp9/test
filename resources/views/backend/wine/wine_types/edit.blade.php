@extends('backend.layouts.master')
@section('content')

    <h1>Edit Winetype</h1>
    <hr/>

    {!! Form::model($winetype, [
        'method' => 'PATCH',
        'url' => ['winetypes', $winetype->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('wine_type') ? 'has-error' : ''}}">
                {!! Form::label('wine_type', 'Wine Type: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('wine_type', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('wine_type', '<p class="help-block">:message</p>') !!}
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