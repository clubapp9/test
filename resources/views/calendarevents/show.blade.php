@extends('layouts.master')

@section('content')

    <h1>Calendarevent</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Start</th><th>End</th><th>Title</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $calendarevent->id }}</td> <td> {{ $calendarevent->start }} </td><td> {{ $calendarevent->end }} </td><td> {{ $calendarevent->title }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection