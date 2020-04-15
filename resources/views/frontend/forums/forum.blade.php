@extends('frontend.layouts.master')

@section('content')
	<div class="row">

        <!-- Parent Body Container -->
		<div class="col-md-8 col-md-offset-1">

            @include('frontend.includes.content_header')
            <!--<div class="col-md-10" style="padding-top:5px;"> <strong> {{ $forum_name or 'General Forum'  }} </strong> </div>
            -->
            @include('frontend.search.forum_search')
            <div class="col-md-2" style="padding-top:5px;">
                <button class="btn btn-primary btn-sm" value="start_forum_topic">START A NEW TOPIC</button>
            </div>
            @include('forumstopics.create')
            @yield('forumstopics_entry')


            <div class="pagination"> @if(!empty($results)){!! $results->render() !!}@endif </div>

            <!-- Latest Entries -->
            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top:5px;">
                <div class="col-lg-12 col-md-12 col-sm-12" style="background-color:gray;color:#fff;padding:7px;">
                    <div class="col-lg-6 col-md-6 col-sm-6" style="background-color:gray;">
                        TOPIC
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="background-color:gray;">
                        VOICES
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="background-color:gray;">
                        POSTS
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="background-color:gray;">
                        LAST UPDATE
                    </div>
                </div>

                @if(!empty($results))
                    @foreach($results as $entry)
                            <div id="row-container" class="col-lg-12 col-md-12 col-sm-12" style="color:#000;padding:7px;">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="/forum-topic/{{ $entry->forum_topic_id }}">{{ $entry->topic }}</a>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    {{ $entry->voices or '1' }}
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    {{ $entry->posts or '1' }}
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    {{ $entry->last_reply or 'No Replies Yet' }}
                                </div>
                            </div>
                   @endforeach
                @endif

                    <div class="pagination"> @if(!empty($results)){!! $results->render() !!}@endif </div>
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