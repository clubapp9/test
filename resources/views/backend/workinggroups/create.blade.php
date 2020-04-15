@extends ('backend.layouts.master')

@section ('title', trans('menus.pages_management'))

@section('page-header')
    <h1>
        {{ trans('menus.pages_management') }}
        <small>{{ trans('menus.create_page') }}</small>
    </h1>
@endsection

@section('content')

    <h1>Create New Workinggroup</h1>
    <hr/>

    {!! Form::open(['route' => 'admin.workinggroups.store', 'class' => 'form-horizontal']) !!}

             <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('content_type_id') ? 'has-error' : ''}}">
                {!! Form::label('content_type_id', 'Moderator for Group: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <select name="moderator_id" class="content_type_id">
                        @if(!empty($users))
                            @foreach($users as $user)
                                <option value="{{$user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    {!! $errors->first('moderator_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group {{ $errors->has('about') ? 'has-error' : ''}}">
                {!! Form::label('about', 'About: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('about', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
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