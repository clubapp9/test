@extends ('backend.layouts.master')

@section('content')

    <h1>Portfolio</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>First Name</th><th>Last Name</th><th>Dob</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $portfolio->id }}</td> <td> {{ $portfolio->first_name }} </td><td> {{ $portfolio->last_name }} </td><td> {{ $portfolio->dob }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection