<div class="col-md-8" style="padding-top:5px;">
    <form method="POST" onSubmit="return false;" action="#http://hrv.local:8888/search" accept-charset="UTF-8" class="form-horizontal"><input name="_token" type="hidden" value="rNvJWJTPaBi4vqO2kciS476FzoZpkUZvbsKHsgL7">

        <input name="category_id" type="hidden" value="{{ $category_id or '1' }}">

        <div class="form-group ">
            <div class="col-sm-4">
                <select name="content_type_id" class="form-control small">
                    @if(!empty($content_entry_types))
                        @foreach($content_entry_types as $type)
                            <option value="{{$type->content_type_id }}">{{ $type->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-sm-3">
                <input class="form-control small" name="content_title" type="text" id="content_title" placeholder="keyword(s)">

            </div>
            <div class="col-sm-1" style="vertical-align:bottom;">
                <input class="btn btn-primary btn-sm" type="submit" value="Search">
            </div>
        </div>
    </form>
</div>