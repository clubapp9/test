@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <!-- Parent Body Container -->
        <div class="col-md-8 col-md-offset-1">

            @include('frontend.includes.content_header')
            <div class="col-md-10" style="padding-top:5px;"> <strong> {{ 'RECENT ACTIVITY'  }} </strong> </div>
            @include('frontend.search.search')
            <div class="col-md-2" style="padding-top:5px;">
                <button class="btn btn-primary btn-sm" value="{{ $page_category }}">ADD A {{ $page_category }} </button>
            </div>
            @include('frontend.contententry.create')
            @yield('content_entry')

            <!-- Latest Entries -->
            <div class="col-md-11" style="padding-top:5px;">
                @if(!empty($content_entry_types))

                    @foreach($results as $entry)
                        <div class="col-md-12" style="padding-top:5px;background-color:#eeeeee;">
                            <i class="fa fa-user"></i> <a href="#">{{ $entry->first_name }} {{ $entry->last_name }}</a> shared a <strong>{{ $entry->content_type_name }}</strong> <strong>on</strong> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($entry->created_at))->diffForHumans() }} <br/>

                            <!-- Left Side -->
                            <div class="col-md-4" style="padding-top:5px;">
                                @if(strtolower($entry->content_type_name) == 'article')
                                    <img src="{{ asset('img/article_placeholder.png') }}">
                                @elseif(strtolower($entry->content_type_name) == 'video')
                                    <img src="{{ asset('img/video_placeholder.png') }}">
                                @endif
                            </div>

                            <!-- Right Side -->
                            <div class="col-md-7" style="padding-top:5px;">
                                <h4>{{ $entry->content }}</h4>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="pagination"> {!! $results->render() !!} </div>
            </div>

        </div><!-- col-md-8 -->

        <!-- Right Sidebar -->
        @include('frontend.includes.group_sidebar')

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