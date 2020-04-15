@extends('backend.layouts.master')
@section('content')

    <h1>Wine Inventory <a href="{{ url('admin/wine/wine_inventory/create') }}" class="btn btn-primary pull-right btn-sm">Add New Wine_inventory</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Wine Id</th><th>Wine Inventory</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($WineInventory as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('wine_inventory', $item->id) }}">{{ $item->wine_id }}</a></td><td>{{ $item->wine_inventory }}</td>
                    <td>
                        <a href="{{ url('wine_inventory/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['wineinventory', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $WineInventory->render() !!} </div>
    </div>

@endsection
