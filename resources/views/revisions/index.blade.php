@extends('layouts.master')

@section('content')

    <h1>Revisions <a href="{{ url('revisions/create') }}" class="btn btn-primary pull-right btn-sm">Add New Revision</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Revision Type Id</th><th>Action Log</th><th>Notes</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($revisions as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('revisions', $item->id) }}">{{ $item->revision_type_id }}</a></td><td>{{ $item->action_log }}</td><td>{{ $item->notes }}</td>
                    <td>
                        <a href="{{ url('revisions/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['revisions', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $revisions->render() !!} </div>
    </div>

@endsection
