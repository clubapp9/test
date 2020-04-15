@extends('frontend.layouts.master')

@section('content')
	<div class="row">

        <!-- Parent Body Container -->
		<div class="col-md-8 col-md-offset-1">

            @include('frontend.includes.content_header')
            @include('frontend.search.search')
            <div class="col-md-10" style="padding-top:5px;">
                <button class="btn btn-primary btn-sm" value="Add {{ $page_category }}">ADD A {{ $page_category }} </button>
            </div>
            @include('frontend.contententry.create-resource')
            @yield('content_entry')

            <!-- Latest Entries -->
            <div class="col-md-11" style="padding-top:10px;">
                @if(!empty($content_entry_types))

                    @foreach($results as $entry)
                        <div class="col-md-12" style="padding-top:5px;background-color:#eeeeee;">
                            @if(!empty($entry->content_title))
                                <p style=" font-size: 1.5em;font-weight:bolder;padding:0;line-height:0.8em;">{{ $entry->content_title }}</p>
                            @endif
                         <p style=" font-size: 0.9em;line-height:0.8em;"> Shared by <a href="#">
                                 @if(!empty($entry->first_name)){{ $entry->first_name }} @endif
                                 @if(!empty($entry->last_name)){{ $entry->last_name }} @endif
                             </a> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($entry->created_at))->diffForHumans() }} <br/></p>
                        <p style=" font-size: 0.9em;line-height:0.8em;">
                            {{ $entry->content }}
                        </p>
                        </div>
                    @endforeach
                @endif
                    <div class="pagination"> {!! $results->render() !!} </div>
            </div>


            @include('frontend.resources.sidebars.sidebar')


        </div><!-- col-md-8 -->

        <!-- Right Sidebar -->
        @yield('sidebar')



	</div><!-- row -->
@endsection

@section('after-scripts-end')
    <script>
        $( "button" ).click(function() {
            $( "#add" ).toggle();
        });
//alert(window.document.location.pathname);
       // $('a[href="' + window.document.location.pathname + '"]').parents('li,ul').addClass('activesss');
    </script>

	<script>
		//Being injected from FrontendController
		//console.log(test);
	</script>
@stop