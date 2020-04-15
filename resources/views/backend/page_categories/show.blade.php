@extends('layouts.master')

@section('content')

    <h1>Page_category</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Title</th><th>Slug</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $page_category->id }}</td> <td> {{ $page_category->title }} </td><td> {{ $page_category->slug }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection