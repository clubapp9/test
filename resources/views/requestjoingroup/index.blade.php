@extends('layouts.master')

@section('content')

    <h1>Requestjoingroup <a href="{{ url('requestjoingroup/create') }}" class="btn btn-primary pull-right btn-sm">Add New Requestjoingroup</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Working Group Id</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($requestjoingroup as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('requestjoingroup', $item->id) }}">{{ $item->working_group_id }}</a></td>
                    <td>
                        <a href="{{ url('requestjoingroup/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['requestjoingroup', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $requestjoingroup->render() !!} </div>
    </div>

@endsection
