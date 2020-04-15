@extends('frontend.layouts.master')

@section('content')
	<div class="row">

        <!-- Parent Body Container -->
		<div class="col-md-8 col-md-offset-1">

            @include('frontend.includes.content_header')
            @include('frontend.search.custom_search')

            <!-- Latest Entries -->
            <div class="col-md-11" style="padding-top:10px;">
                @if(!empty( $results ))

                    @foreach( $results as $entry )
                        <div class="col-md-12" style="padding-top:15px;background-color:#eeeeee;">

                            <!-- image of user -->
                            <div class="col-md-3">
                                @if(!empty($entry->picture))
                                    <img src="{{ $entry->picture }}" height="100" width="100">
                                    @else <img src="{{ URL::asset('img/empty_photo.png')}}">
                                @endif
                            </div>

                            <!-- Name & Bio -->
                            <div class="col-md-9">
                                @if(!empty($entry->first_name && $entry->last_name))
                                    <p style=" font-size: 1.2em;font-weight:bolder;padding:0;line-height:0.8em;"><a href="#">{{ $entry->first_name }} {{ $entry->last_name }}</a></p>
                                @elseif(!empty( $entry->first_name ))  <p style=" font-size: 1.2em;font-weight:bolder;padding:0;line-height:0.8em;"><a href="#"> {{ $entry->first_name }} </a> </p>
                                @elseif(!empty( $entry->last_name ))  <p style=" font-size: 1.2em;font-weight:bolder;padding:0;line-height:0.8em;"><a href="#"> {{ $entry->last_name }} </a></p>
                                @else  <p style=" font-size: 1.2em;font-weight:bolder;padding:0;line-height:0.8em;"> NAME </p>
                                @endif

                                @if(!empty( $entry->short_bio ))
                                  <p style=" font-size: 1em;font-weight:bolder;padding:0;line-height:0.8em;">{{ $entry->short_bio }}</p>
                                @else  <p style=" font-size: 1em;font-weight:bolder;padding:0;line-height:0.8em;">This user has no bio.</p>
                                @endif
                            </div>

                        </div>
                    @endforeach
                @endif
                    <div class="pagination"> {!! $results->render() !!} </div>
            </div>


            @include('frontend.resources.sidebars.speakers')


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