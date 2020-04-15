@section('forum_topic_form_body')
    <div class="form-group {{ $errors->has('topic') ? 'has-error' : ''}}">
        {!! Form::label('topic', 'Topic: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('topic', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('topic', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
        {!! Form::label('description', 'Description(required): ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('message', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endsection