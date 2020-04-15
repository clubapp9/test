@extends('layouts.master')

@section('content')

    <h1>Requests <a href="{{ url('requests/create') }}" class="btn btn-primary pull-right btn-sm">Add New Request</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>User Id</th><th>Request Type</th><th>Request Message</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($requests as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('requests', $item->id) }}">{{ $item->user_id }}</a></td><td>{{ $item->request_type }}</td><td>{{ $item->request_message }}</td>
                    <td>
                        <a href="{{ url('requests/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['requests', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $requests->render() !!} </div>
    </div>

@endsection
