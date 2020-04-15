@extends('layouts.master')

@section('content')

    <h1>Page</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Page Category Id</th><th>Title</th><th>Slug</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $page->id }}</td> <td> {{ $page->page_category_id }} </td><td> {{ $page->title }} </td><td> {{ $page->slug }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection