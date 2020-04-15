@extends('frontend.layouts.master')

@section('content')
	<div class="row">
        <!-- Parent Body Container -->
		<div class="col-md-8 col-md-offset-1">

            @include('frontend.includes.content_header')

            @if($hasAccess)
                @include('frontend.search.search')
                <div class="col-md-2" style="padding-top:5px;">
                    <button class="btn btn-primary btn-sm" value="{{ $page_category }}">ADD AN ITEM</button>
                </div>
                @include('frontend.contententry.create')
                @yield('content_entry')
            @endif

            @if($isModerator)
                <div class="col-md-11" style="padding-top:5px;">
                    <h4>Pending Requests to Join Group:</h4>
                    @if(!empty($requests))
                    @foreach($requests as $request)
                       <li> {{ $request->first_name }} {{ $request->last_name }} ( {{ $request->email }} )
                           {!! Form::open([
                           'method' => 'PATCH',
                           'url' => ['requestjoingroup', $request->id],
                           'style' => 'display:inline'
                           ]) !!}
                           {!! Form::submit('Approve', ['class' => 'btn btn-xs']) !!}
                           {!! Form::close() !!}
                            &nbsp; | &nbsp;
                           {!! Form::open([
                           'method'=>'DELETE',
                           'url' => ['requestjoingroup', $request->id],
                           'style' => 'display:inline'
                           ]) !!}
                           {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                           {!! Form::close() !!}
                       </li>
                    @endforeach
                        @else
                        <h4>No pending reuqests</h4>
                    @endif
                </div>
            @endif

            <!-- Latest Entries -->
            <div class="col-md-11" style="padding-top:5px;">
                <h4>About this Group</h4>
                  @if(!empty($group))
                        <div class="col-md-12" style="padding-top:5px;background-color:#eeeeee;">
                            {{ $group->about }}
                        </div>
                  @endif
            </div>

        </div><!-- col-md-8 -->

        @include('frontend.includes.group_sidebar')

        <!-- Right Sidebar -->
        @yield('sidebar')



	</div><!-- row -->
@endsection

@section('after-scripts-end')
    <script>
        $( "button" ).click(function() {
            $( "#add" ).toggle();
        });
    </script>

	<script>
		//Being injected from FrontendController
		//console.log(test);
	</script>
@stop