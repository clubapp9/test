@extends('layouts.master')

@section('content')

    <h1>Contententry</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>User Id</th><th>Category Id</th><th>Content Type Id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $contententry->id }}</td> <td> {{ $contententry->user_id }} </td><td> {{ $contententry->category_id }} </td><td> {{ $contententry->content_type_id }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection