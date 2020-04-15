@extends('layouts.master')

@section('content')

    <h1>Workinggroup</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Moderator Id</th><th>About</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $workinggroup->id }}</td> <td> {{ $workinggroup->name }} </td><td> {{ $workinggroup->moderator_id }} </td><td> {{ $workinggroup->about }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection