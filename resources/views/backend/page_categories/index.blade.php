@extends('layouts.master')

@section('content')

    <h1>Page_categories <a href="{{ route('page_categories.create') }}" class="btn btn-primary pull-right btn-sm">Add New Page_categories</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Title</th><th>Slug</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($page_categories as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/page_categories', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->slug }}</td>
                    <td>
                        <a href="{{ route('page_categories.edit', $item->id) }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['page_categories.destroy', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $page_categories->render() !!} </div>
    </div>

@endsection
