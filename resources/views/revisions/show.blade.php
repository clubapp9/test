@extends('layouts.master')

@section('content')

    <h1>Revision</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Revision Type Id</th><th>Action Log</th><th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $revision->id }}</td> <td> {{ $revision->revision_type_id }} </td><td> {{ $revision->action_log }} </td><td> {{ $revision->notes }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection