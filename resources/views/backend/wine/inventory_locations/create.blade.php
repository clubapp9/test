@extends('backend.layouts.master')

@section('content')

    <h1>Create New Inventory Location</h1>
    <hr/>
    {!! Form::open(['route' => 'admin.wine.inventory_locations.store', 'class' => 'form-horizontal']) !!}

    <div class="input-group col-lg-8 col-xs-8 col-md-8" style="padding-top:2em;">
        {!! Form::label('Existing Locations:', 'Existing Inventory Locations:', ['for' => 'name', 'class' => 'control-label']) !!}
        <div style="clear: both;"></div>

        <select id="add_wine_type_select" class="form-control" name="type_id" size="8">
            @if($inventory_locations)
                @foreach ($inventory_locations as $inventory_location)
                    <option value="{{ $inventory_location->id }}">{{ $inventory_location->location }}</option>
                @endforeach
            @endif
        </select>
        {{-- {{!! Form::number('type_id', null, ['class' => 'form-control']) !!} --}}
        {!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}
    </div>


    <div class="input-group col-lg-8 col-xs-8 col-md-8" style="padding-top:2em;">
                {!! Form::label('inventory_location', 'Add Inventory Location: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div style="clear: both;"></div>
                    {!! Form::text('location', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('inventory_location', '<p class="help-block">:message</p>') !!}

            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('ADD NEW', ['class' => 'btn btn-primary form-control']) !!}
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