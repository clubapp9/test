@extends('layouts.master')

@section('content')

    <h1>Revision_type</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Revision Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $revision_type->id }}</td> <td> {{ $revision_type->revision_type }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection