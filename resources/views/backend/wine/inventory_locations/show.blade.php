@extends('backend.layouts.master')

@section('content')

    <h1>Wine_location</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Wine Location</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $wine_locations->id }}</td> <td> {{ $wine_locations->wine_location }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection