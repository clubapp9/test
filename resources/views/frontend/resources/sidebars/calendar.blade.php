@section('sidebar')
    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-body">
               <strong style="font-weight:bolder;font-size:1.5em;">ABOUT THE CALENDAR</strong>
                <p>
                        {{ $sidebar_content or "Content Goes Here" }}
                </p>

                <button class="btn btn-primary btn-sm" value="ADD AN EVENT">ADD AN EVENT </button>

            </div>

        </div><!-- panel -->

    </div><!-- col-md-2 -->
@endsection