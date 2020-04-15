@extends ('backend.layouts.master')

@section ('title', trans('menus.pages_management'))

@section('page-header')
    <h1>
        {{ trans('menus.pages_management') }}
        <small>{{ trans('menus.all_pages') }}</small>
    </h1>
@endsection

@section('content')

    <h1>Manage <a href="{{ route('admin.page-categories.create') }}" class="btn btn-primary btn-sm">Add Page Category</a>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm">Add New Pages</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th><th>Page Category Id</th><th>Title</th><th>Slug</th><th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($pages as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/pages', $item->id) }}">{{ $item->page_category_id }}</a></td><td>{{ $item->title }}</td><td>{{ $item->slug }}</td>
                    <td>
                        <a href="{{ route('admin.pages.edit', $item->id) }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                        'method'=>'DELETE',
                        'route' => ['admin.pages.destroy', $item->id],
                        'style' => 'display:inline'
                        ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $pages->render() !!} </div>
    </div>

@endsection
