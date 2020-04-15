@extends('layouts.master')

@section('content')

    <h1>Csv_datum</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Csv Filename</th><th>Csv Header</th><th>Csv Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $csv_datum->id }}</td> <td> {{ $csv_datum->csv_filename }} </td><td> {{ $csv_datum->csv_header }} </td><td> {{ $csv_datum->csv_data }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection