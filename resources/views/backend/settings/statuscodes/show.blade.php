@extends ('backend.layouts.master')

@section('content')

    <h1>Statuscode</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Status Code</th><th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $statuscode->id }}</td> <td> {{ $statuscode->status_code }} </td><td> {{ $statuscode->description }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection