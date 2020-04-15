@extends('layouts.master')

@section('content')

    <h1>Requestjoingroup</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Working Group Id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $requestjoingroup->id }}</td> <td> {{ $requestjoingroup->working_group_id }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection