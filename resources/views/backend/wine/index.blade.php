@extends('backend.layouts.master')

@section('content')

    <h1>Wine <a href="{{ url('admin/wine/create') }}" class="btn btn-primary pull-right btn-sm">Add New Wine</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>

                <tr>
                    <!--<th width="80px"></th>-->
                    <th>@sortablelink('upc')</th>
                    <th>@sortablelink('name')</th>
                    <th>@sortablelink('vintage')</th>
                    <th>@sortablelink('cost')</th>
                    <th>@sortablelink('regular_sell_price')</th>
                    <th>@sortablelink('created_at')</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($wine as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td><a href="{{ url('admin/wine', $item->id) }}">{{ $item->upc }}</a></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->vintage }}</td>
                    <td>{{ $item->cost }}</td>
                    <td>{{ $item->regular_sell_price }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ url('admin/wine/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['admin.wine.destroy', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination">  {!! $wine->appends(\Request::except('page'))->render() !!} {{-- $wine->render() --}} </div>


    </div>

@endsection
