@extends('backend.layouts.master')

@section('content')

    <h1>Inventory Locations <a href="{{ url('admin/wine/inventory_locations/create') }}" class="btn btn-primary pull-right btn-sm">Add New Wine_location</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Inventory Location</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($inventory_locations as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/wine/inventory_locations', $item->id) }}">{{ $item->location }}</a></td>
                    <td>
                        <a href="{{ url('admin/wine/inventory_locations' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/wine/inventory_locations/delete', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $inventory_locations->render() !!} </div>
    </div>

@endsection
