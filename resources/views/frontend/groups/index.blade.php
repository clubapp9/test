@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <!-- Parent Body Container -->
        <div class="col-md-8 col-md-offset-1">

            @include('frontend.includes.content_header')
            <div class="col-md-10" style="padding-top:5px;"> <strong> {{ 'List of Groups'  }} </strong> </div>
            @include('frontend.search.search')

            <!-- Latest Entries -->
            <div class="col-md-11" style="padding-top:5px;">
                @if(!empty($working_groups))

                    @foreach($working_groups as $entry)
                        <div class="col-md-12" style="padding-top:5px;background-color:#eeeeee;">
                            <h4>Group: <a href="working_group/{{$entry->working_group_id}}">{{ $entry->name }}</a> </h4>
                        </div>
                    @endforeach
                @endif
            </div>


        </div><!-- col-md-8 -->

        <!-- Right Sidebar -->
        @include('frontend.includes.sidebar')



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