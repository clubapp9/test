@extends('layouts.master')

@include('forms.calendar_event_body')

@section('calendar_event_form')

    <h1>Create New Calendarevent</h1>
    <hr/>

    {!! Form::open(['url' => 'calendarevents', 'class' => 'form-horizontal']) !!}

    @yield('calendar_event_form_body')

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>xx
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection