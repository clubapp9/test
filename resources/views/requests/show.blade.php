@extends('layouts.master')

@section('content')

    <h1>Request</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>User Id</th><th>Request Type</th><th>Request Message</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $request->id }}</td> <td> {{ $request->user_id }} </td><td> {{ $request->request_type }} </td><td> {{ $request->request_message }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection