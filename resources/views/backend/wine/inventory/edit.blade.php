@extends('backend.layouts.master')

@section('content')

    <h1>Edit Wine Inventory</h1>
    <hr/>

    {!! Form::model($wine_inventory, [
        'method' => 'PATCH',
        'url' => ['wine_inventory', $wine_inventory->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('wine_id') ? 'has-error' : ''}}">
                {!! Form::label('wine_id', 'Wine Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('wine_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('wine_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('wine_inventory') ? 'has-error' : ''}}">
                {!! Form::label('wine_inventory', 'Wine Inventory: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('wine_inventory', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('wine_inventory', '<p class="help-block">:message</p>') !!}
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