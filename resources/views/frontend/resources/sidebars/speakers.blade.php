@section('sidebar')
    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-body">
               <strong style="font-weight:bolder;font-size:1.5em;">THE SPEAKERS BUREAU </strong>
                {!! Form::open(['route' => 'requests.store', 'class' => 'form-horizontal']) !!}
                {!! Form::submit('ADD MY PROFILE', ['class' => 'btn btn-primary btn-xs']) !!}
                <input type="hidden" name="request_type" value="add_to_speakers_bureau">
                {!! Form::close() !!}
            </div>

        </div><!-- panel -->

    </div><!-- col-md-2 -->
@endsection