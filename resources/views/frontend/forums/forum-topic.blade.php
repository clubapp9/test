@extends('frontend.layouts.master')

@section('content')
	<div class="row">

        <!-- Parent Body Container -->
		<div class="col-md-8 col-md-offset-1">

            @include('frontend.includes.content_header')
            @include('frontend.search.forum_search')
            @include('forumstopicsreplies.create')
            <div class="col-md-2" style="padding-top:5px;">
                <button class="btn btn-primary btn-sm" value="start_forum_topic">REPLY TO TOPIC</button>
            </div>
            @yield('forum_topic_reply_create')

            <div class="pagination"> </div>

            <!-- Latest Entries -->
            <div class="row col-lg-12 col-md-12 col-sm-12" style="padding-top:5px;">
                @if(!empty($results_topic))

                        <div class="col-lg-12 col-md-12 col-sm-12" style="background-color:#999;color:#fff;padding:7px;">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                User Details
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                {{ $results_topic->topic }}
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12" style="background-color:#fff;color:#fff;padding:7px;">
                            <div class="col-lg-3 col-md-3 col-sm-3" style="color:#000;">
                                <strong>By: </strong> {{ $results_topic->user->first_name }} {{ $results_topic->user->last_name }} <br/>
                                <strong>Date:</strong> {{ $results_topic->created_at }}
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9" style="color:#000;">
                                <span style="color:#000;">Topic Message:</span> <br/> <br/>
                                {{ $results_topic->message }}
                            </div>
                        </div>

                @if(!empty($results_replies))
                    @foreach( $results_replies as $reply )
                        <div id="row-container" class="col-lg-12 col-md-12 col-sm-12" style="color:#000;padding:7px;">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <strong>By: </strong> {{ $reply->user->first_name }} {{ $reply->user->last_name }} <br/>
                                <strong>Date:</strong> {{ $reply->created_at }}
                            </div>

                            <div class="col-lg-9 col-md-9 col-sm-9" style="color:#000;">
                                {{ $reply->message or 'No Replies Yet' }}
                            </div>
                        </div>
                    @endforeach
                @endif
                @endif

            </div>

            @include('frontend.forums.forum_sidebar')

        </div><!-- col-md-8 -->

        <!-- Right Sidebar -->
        @yield('sidebar')



	</div><!-- row -->
@endsection

@section('after-scripts-end')
    <script>
        $( "button" ).click(function() {
            $( "#new_topic" ).toggle();
        });
//alert(window.document.location.pathname);
       // $('a[href="' + window.document.location.pathname + '"]').parents('li,ul').addClass('activesss');
    </script>

	<script>
		//Being injected from FrontendController
		//console.log(test);
	</script>
@stop