@extends ('backend.layouts.master')

@section('content')

    <h1>Statuscodes <a href="{{ url('admin/settings/statuscodes/create') }}" class="btn btn-primary pull-right btn-sm">Add New Statuscode</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Status Code</th><th>Description</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($statuscodes as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/settings/statuscodes', $item->id) }}">{{ $item->status_code }}</a></td><td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ url('admin/settings/statuscodes/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $statuscodes->render() !!} </div>
    </div>

@endsection
