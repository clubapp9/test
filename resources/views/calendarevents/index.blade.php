@extends('layouts.master')

@section('content')

    <h1>Calendarevents <a href="{{ url('calendarevents/create') }}" class="btn btn-primary pull-right btn-sm">Add New Calendarevent</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Start</th><th>End</th><th>Title</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($calendarevents as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('calendarevents', $item->id) }}">{{ $item->start }}</a></td><td>{{ $item->end }}</td><td>{{ $item->title }}</td>
                    <td>
                        <a href="{{ url('calendarevents/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['calendarevents', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $calendarevents->render() !!} </div>
    </div>

@endsection
