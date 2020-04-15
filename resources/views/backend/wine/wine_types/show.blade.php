@extends('backend.layouts.master')

@section('content')

    <h1>Winetype</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Wine Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $winetype->id }}</td> <td> {{ $winetype->wine_type }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection