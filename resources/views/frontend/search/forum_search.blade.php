<div class="col-md-12" style="padding-top:5px;margin-bottom:10px;border:solid 1px;">

    <div class="col-md-7">
        @if(!empty($topic_count))  This forum contains {{ $topic_count }} topics <br/> @endif
        @if(!empty($last_updated))  Last updated by {{ $last_updated->person }} {{ $last_updated->created_at }} <br/> @endif
    </div>

    <div class="col-md-5">
    <form method="POST" onSubmit="return false;" action="#http://hrv.local:8888/search" accept-charset="UTF-8" class="form-horizontal"><input name="_token" type="hidden" value="rNvJWJTPaBi4vqO2kciS476FzoZpkUZvbsKHsgL7">

        <input name="category_id" type="hidden" value="{{ $forum_id or '1' }}">

        <div class="form-group ">
            <div class="col-sm-6">
                <input class="form-control small" name="content_title" type="text" id="content_title" placeholder="Search for">

            </div>
            <div class="col-sm-4" style="vertical-align:bottom;">
                <input class="btn btn-primary btn-sm" type="submit" value="Search">
            </div>
        </div>
    </form>
    </div>
</div>