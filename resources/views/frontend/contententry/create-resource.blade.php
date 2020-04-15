@section('content_entry')

    <div class="col-md-9 col-md-offset-1" id="add" style="border-style: solid;@if(!count($errors))display:none;@endif"><h4>ADD A {{ $page_category or 'Content' }}</h4>
    <hr/>

    {!! Form::open(['route' => 'resourceentry.store', 'class' => 'form-horizontal']) !!}

        <input type="hidden" name="category_id" value="{{ $category_id }}">

            <div class="form-group {{ $errors->has('content_type_id') ? 'has-error' : ''}}">
                {!! Form::label('content_type_id', 'Type: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <select name="content_type_id" class="content_type_id">
                        @if(!empty($content_entry_types))
                            @foreach($content_entry_types as $type)
                                <option value="{{$type->content_type_id }}">{{ $type->name }}</option>
                            @endforeach
                        @endif
                    </select>
                {!! $errors->first('content_type_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

                <div class="form-group">
                    {!! Form::label('content_title', 'Subject: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('content_title', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('content_title', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

            <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                {!! Form::label('content', 'Resource: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('content', null, ['cols' => '5', 'rows' => '5', 'class' => 'form-control']) !!}
                    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        <div class="form-group-sm" id="document" data-provides="fileupload" style="display:none;">
                <div class="col-sm-6 col-sm-offset-3">
                    <div style="position:relative;">
                        <a class='btn btn-primary' href='javascript:;'>
                            Choose File...
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-info' id="upload-file-info"></span>
                    </div>
                </div>
        </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3" style="padding-top:10px;">
            {!! Form::submit('Add', ['class' => 'btn btn-primary btn-xs']) !!}
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
</div>

    <script type="text/javascript">
        $(".content_type_id").change(function() {
            var select = $(".content_type_id option:selected").text();
            switch (select) {
                case "document":
                    var ele = document.getElementById('document');
                        ele.style.display = 'block';
                    break;
                default:
                    var ele = document.getElementById('document');
                    ele.style.display = 'none';
                    break;
            }
        });
    </script>

@endsection