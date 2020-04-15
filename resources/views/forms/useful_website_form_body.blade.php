@section('useful_website_form_body')
    <div class="form-group {{ $errors->has('website') ? 'has-error' : ''}}">
        {!! Form::label('title', 'Title: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('website') ? 'has-error' : ''}}">
        {!! Form::label('website', 'Website: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('website', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
        {!! Form::label('message', 'Description: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('message', null, ['cols' => '5', 'rows' => '5', 'class' => 'form-control']) !!}
            {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endsection