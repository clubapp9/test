@extends('frontend.layouts.master')

@section('content')
	<div class="row">

        <!-- Parent Body Container -->
		<div class="col-md-8 col-md-offset-1">

            @include('frontend.includes.content_header')
            <div class="col-md-10" style="padding-top:5px;"> <strong> {{ 'DOCUMENTATION'  }} </strong> </div>

            <!-- Latest Entries -->
            <div class="col-md-11" style="padding-top:5px;" id="foo">
                @if($url)

                <iframe src="{{ $url }}@if($p)&p={{ $p }}@endif" frameborder="0" scrolling="no" onload="this.style.height=screen.height +'px';this.style.width=document.getElementById('header_background').offsetWidth -25 +'px';">
                </iframe>
                @endif
            </div>

            @include('frontend.includes.sidebar')

        </div><!-- col-md-8 -->

        <!-- Right Sidebar -->
        @yield('sidebar')



	</div><!-- row -->
@endsection

@section('after-scripts-end')
	<script>
		//Being injected from FrontendController
		//console.log(test);
	</script>
@stop