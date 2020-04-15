@section('sidebar')
    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-heading"> <h4 style="color:gray;">GROUP MODERATOR</h4>

                <div>
                    @if( !empty($group->user->picture ) )
                        <img src="{{ asset('/img/users/photo/{{ $group->user->picture') }}" width="20" height="20">
                    @else2
                        <img src="{{ asset('/img/empty_photo.png') }}" width="40" height="40">
                    @endif

                    @if( !empty( $group->user->first_name ) )
                        {{ $group->user->first_name }}
                    @endif
                </div>

                <div>
                    @if( !empty( $group->user->short_bio ) )
                        {{ $group->user->short_bio }}
                    @endif
                </div>

                @if(!$hasAccess)
                    <div style="padding-top:5px;">
                        <div class="panel-body">
                            {!! Form::open(['route' => 'requestjoingroup.store', 'class' => 'form-horizontal']) !!}
                            {!! Form::submit('request to join group', ['class' => 'custom-request-button']) !!}
                            <input type="hidden" name="working_group_id" value="{{ $group->working_group_id }}">
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endif
            </div>

        </div><!-- panel -->

    </div><!-- col-md-2 -->
@endsection