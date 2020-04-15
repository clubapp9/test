@extends('layouts.master')

@section('content')

    <h1>Contententries <a href="{{ route('contententries.create') }}" class="btn btn-primary pull-right btn-sm">Add New Contententries</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>User Id</th><th>Category Id</th><th>Content Type Id</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($contententries as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/contententries', $item->id) }}">{{ $item->user_id }}</a></td><td>{{ $item->category_id }}</td><td>{{ $item->content_type_id }}</td>
                    <td>
                        <a href="{{ route('contententries.edit', $item->id) }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['contententries.destroy', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $contententries->render() !!} </div>
    </div>

@endsection
