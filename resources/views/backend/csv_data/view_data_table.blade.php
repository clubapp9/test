@extends ('backend.layouts.master')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/datatables.css')}}" media="screen">


<link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/datatables.css')}}" media="screen">

<script type="text/javascript" src="{{ URL::asset('js/datatables/jquery.ui.widget.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatables/jquery-ui.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatables/jquery.dataTables.min.css')}}" media="screen">

<script type="text/javascript" src="{{ URL::asset('js/datatables/jquery.dataTables.js')}}"></script>

<script type="text/javascript" src="{{ URL::asset('js/datatables/wnc_ajaj.js')}}"></script>

@section ('title', trans('menus.csvimport_success'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CSV Import - Preview Data</div>

                    <div class="panel-body">
                        @include('includes.ajax_datatables')
                        @include('includes.ajax_form_generator')
                        <row>
                            <!-- Data -->
                            @include('frontend.account.datatables.sheets')



                        </row>
                    </div>
                </div>
            </div>
        </div>
    </div>
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