@extends('frontend.layouts.master')

@section('content')
	<div class="row">
        <!-- Parent Body Container -->
		<div class="col-md-12">

            <!DOCTYPE html>
            <!-- saved from url=(0040)http://192.168.0.209/collector_ui/search -->
            <html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

                <title>Account Detail</title>

                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="">

                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/general.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/toastr.min.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/feedback.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/datatables.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/account_distribution.css')}}" media="screen">
                <!--<link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/account/account_view.css')}}" media="screen">
                -->
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/jquery.dataTables.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/jquery-ui-1.10.0.custom.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/bootstrap.min.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/bootstrap-responsive.min.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/profile-image.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/hamburgerSlider.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/clos-buttons.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/clos-icons.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/style.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/screen.css')}}" media="screen">

                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/account_detail.css')}}" media="screen">


                <script type="text/javascript" src="{{ URL::asset('js/datatables/jquery.ui.widget.js')}}"></script>
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatables/jquery-ui.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatables/jquery.dataTables.min.css')}}" media="screen">

                <script type="text/javascript" src="{{ URL::asset('js/datatables/jquery.dataTables.js')}}"></script>

                <script type="text/javascript" src="{{ URL::asset('js/datatables/wnc_ajaj.js')}}"></script>

                <script type="text/javascript" src="{{ URL::asset('reused_assets/account/account.view.js.download')}}"></script>

            </head>
            <body class="dt-example"><input type="hidden" id="theme_url" value="subtheme/standard/css/style.css">
            <input type="hidden" id="theme_name" value="standard">

                <div class="page-wrapper">
                    <input type="hidden" id="user_id" value="PML">
                    <div class="search-wrapper">
                        <div class="results account-search-area">

                            <div class="search-box">
                                <div class="content-title" style="padding:0px;margin:0px;margin-bottom:.2em; border-bottom: 3px solid #e0e0e0;">
                                    <div class="account-search-title" style="color:white;padding-bottom:.2em;"><span>Debtor ID:
                                            @if($account_result !== '')
                                                {{$account_result[0]->id}}
                                            @endif</span>

                                        @if($account_result !== '')
                                            <input type="hidden" id="account_id" value="{{$account_result[0]->id}}">
                                            @endif
                                    </div>
                                </div>

                                @include('includes.ajax_datatables')
                                @include('includes.ajax_form_generator')

                                    <row>
                                        @include('frontend.account.datatables.account_data')
                                    </row>
                                <div style="clear:both"> &nbsp;</div>
                                <row>
                                    <!-- Phone Number -->
                                    @include('frontend.account.datatables.phones')

                                    <!-- Notes -->
                                    @include('frontend.account.datatables.notes')

                                </row>


                                <div style="clear:both"> &nbsp;</div>

                                <row>
                                    <!-- Addresses -->
                                    @include('frontend.account.datatables.addresses')

                                    <!-- Payments & PDC -->
                                    @include('frontend.account.datatables.payments')

                                    <!-- Employers -->
                                    @include('frontend.account.datatables.employers')
                                </row>


                            </div>

                        </div>
                    </div>
                </div>

                <div id="debug"></div>

            </div><button class="feedback-btn feedback-btn-gray">Create Ticket</button></body></html>

        </div><!-- col-md-8 -->

        <!-- Right Sidebar -->
       <!--!yield('sidebar') -->

	</div><!-- row -->

    <style type="text/css">
        .dataTables_filter{ float: left !important; }

        table.dataTable thead tr {
            background-color: gray;
            color: #fff;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
@endsection

@section('after-scripts-end')
    <script>
        $(document).ready( function() {

        $(document).ready(function() {
            var t = $('#example').DataTable({
                "order": [[ 0, "desc" ]],
                "scrollY":        "200px",
                "scrollCollapse": true,
                "paging":         false,
                "pageLength": 6,
                "lengthChange": false,
                "columnDefs": [
                    { "width": "5%", "targets": 0 }, ]

            });
            var counter = 1;

            $('#addRow').on( 'click', function () {
                t.row.add( [
                    counter +'.1',
                    counter +'.2',
                    counter +'.3',
                    counter +'.4',
                    counter +'.5'
                ] ).draw( false );

                counter++;
            } );

            // Automatically add a first row of data
            $('#addRow').click();
        } );

            $('#example2').dataTable({
                "order": [[ 2, "desc" ]],
                "scrollY":        "200px",
                "scrollCollapse": true,
                "paging":         false,
                "pageLength": 6,
                "lengthChange": false,
                "columnDefs": [
                    { "width": "15%", "targets": 0 } ]

            });
        } );



        $( "button" ).click(function() {
            $( "#add" ).toggle();
        });

    </script>



    <style type="text/css">
        .DynamicForms {
            border:1px dotted black;
            padding-bottom:5px;
        }
        .DynamicEntryForms input{
            height: 1.5em !important;
            height: 20px;
            padding: 4px 6px;
            margin-bottom: 10px;
            font-size: 14px;
            line-height: 20px;
            color: #555;
            border:1px dotted;
        }
    </style>

	</script>
@stop