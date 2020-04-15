@section('content_entry')
    @include('forms.calendar_event_form_body')
    @include('forms.useful_website_form_body')
    @include('forms.forum_topic_form_body')
    <!-- Dynamic Loading of Form Definitions into JavaScript -->
    <script type="text/javascript">
        var calendar_event_form_body = `@yield('calendar_event_form_body')`
        var useful_website_form_body = `@yield('useful_website_form_body')`
        var forum_topic_form_body = `@yield('forum_topic_form_body')`

        var default_content_entry_form = `
        <div class="form-group">
        {!! Form::label('content_title', 'Title: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
        {!! Form::text('content_title', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('content_title', '<p class="help-block">:message</p>') !!}
        </div>
        </div>
        <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
        {!! Form::label('link', 'Link: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
        {!! Form::text('link', null, ['class' => 'form-control']) !!}
        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
        </div>
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
        {!! Form::label('content', 'Description: ', ['class' => 'col-sm-3 control-label']) !!}
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
        </div>`;
    </script>

    <div class="col-md-9 col-md-offset-1" id="add" style="border-style: solid;@if(!count($errors))display:none;@endif">
        <h4>ADD A {{ $page_category or 'Content' }}</h4>
    <hr/>

    {!! Form::open(['route' => 'contententry.store', 'class' => 'form-horizontal', 'id' => 'latest_developments_form']) !!}
            <input type="hidden" id="category_id" name="category_id" value="{{ $category_id }}">

            @if(!empty($group))
                @if($group->working_group_id)
                    <input type="hidden" id="working_group_id" name="working_group_id" value="{{$group->working_group_id}}">
                @endif
            @endif
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

        <div id="dynamic_form_area">

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

        var dynamic_form_area = window.document.getElementById('dynamic_form_area');
        dynamic_form_area.innerHTML = default_content_entry_form;

        var the_form = window.document.getElementById('latest_developments_form');
        var category_id = window.document.getElementById('category_id');

        $(".content_type_id").change(function() {
            var select = $(".content_type_id option:selected").text();
            switch (true) {
                case select == "Document":
                    dynamic_form_area.innerHTML = default_content_entry_form;
                    the_form.action = 'contententry'
                    var ele = document.getElementById('document');
                        ele.style.display = 'block';
                    break;
                case select == "Event Calendar":
                    the_form.action = 'calendar_event';
                    dynamic_form_area.innerHTML = calendar_event_form_body;
                    break;
                case select.search("Resource") > 0:
                    dynamic_form_area.innerHTML = default_content_entry_form;
                    category_id.value = '2';
                    the_form.action = 'resourceentry'
                    break;
                case select == "Useful Website":
                    the_form.action = 'usefulwebsites';
                    dynamic_form_area.innerHTML = useful_website_form_body;
                    break;
                default:
                    category_id.value = '1';
                    dynamic_form_area.innerHTML = default_content_entry_form;
                    var ele = document.getElementById('document');
                    the_form.action = 'contententry'
                    ele.style.display = 'none';
                    break;
            }
        });

        /*var form_element = window.document.getElementById('latest_developments_form');

        form_element.innerHTML = calendar_event_form_body;*/

    </script>

@endsection