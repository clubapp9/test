@section('sidebar')
    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-body">
               <strong style="font-weight:bolder;font-size:1.5em;"> SUGGEST A MEMBER </strong>
                <p>
                        {{ $sidebar_content or " " }}
                </p>
                {!! Form::open(['route' => 'requests.store', 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="request_type" value="suggest_member">
                Message (please include users email): <br/> <textarea type="request_message" name="request_message" cols="25" rows="5" required="required"></textarea>
                <br/>
                {!! Form::submit('SUGGEST MEMBER', ['class' => 'btn btn-primary btn-xs']) !!}
                {!! Form::close() !!}

            </div>

        </div><!-- panel -->

    </div><!-- col-md-2 -->
@endsection