@extends('layouts.master')

@section('content')

    <h1>Usersinfo</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>First Name</th><th>Last Name</th><th>Title</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $usersinfo->id }}</td> <td> {{ $usersinfo->first_name }} </td><td> {{ $usersinfo->last_name }} </td><td> {{ $usersinfo->title }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection