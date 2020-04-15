@extends('frontend.layouts.master')
@section('content')
	<div class="row">
        <!-- Parent Body Container -->
		<div class="col-md-11 col-md-offset-1">
            <!DOCTYPE html>
            <html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

                <title>VintVine Reports</title>

                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="">

                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/general.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/toastr.min.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/feedback.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/datatables.css')}}" media="screen">
                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/account_distribution.css')}}" media="screen">
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

                <link rel="stylesheet" type="text/css" href="{{ URL::asset('reused_assets/account_search.css')}}" media="screen">

                <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"
                        integrity="sha256-0vBSIAi/8FxkNOSKyPEfdGQzFDak1dlqFKBYqBp1yC4="
                        crossorigin="anonymous"></script>

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">

                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>


            </head><body class="backgroundimage-blur20"><input type="hidden" id="theme_url" value="subtheme/standard/css/style.css">
            <input type="hidden" id="theme_name" value="standard">

            <div class="container"> <!-- Start of Main Container -->

                <div class="masthead">

                </div>

                <div class="page-wrapper">
                    <input type="hidden" id="user_id" value="PML">
                    <div class="search-wrapper">
                        <div class="sidebar">
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>
                                <label>
                                    <span><b>Start Date</b></span>
                                    <input type="text" placeholder="Month/Day" id="datepicker" name="start_date" class="validate[required]" maxlength="40" tabindex="4" class="square-input search-input"/>
                                </label>


                            <label for="end_date">
                                <span><b>End Date</b></span>
                                    <br/>
                                <input type="text" placeholder="Month/Day" id="datepicker2" name="end_date" class="validate[required]" maxlength="40" tabindex="4" class="square-input search-input"/>
                            </label>

                            <label for="denger">Data Type:
                            <select name="data_type" id="data_type" class="form-control input-md">
                                <option value="1">Text</option>
                                <option value="2">Numeric</option>
                                <option value="3">Date</option>
                                <option value="4">Percentage</option></select>
                            </label>

                            <label for="denger">Frequency:
                            <select name="frequency" id="frequency" class="form-control input-md">
                                <option>None</option>
                                <option value="1">Daily</option>
                                <option value="2">Weekly</option>
                                <option value="3">Monthly</option>
                                <option value="4">Yearly</option></select>
                            </label>


                                <div class="search-slide">
                                    <input type="hidden" name="search_status_code" id="search_status_code" value="1">

                                    <label>
                                        <span>Report Sheet List</span>
                                        <select id="sheet_id" name="sheet_id" class="square-input search-input">
                                            <option value="" selected="selected">(no reportselected)</option>

                                        @if(!empty($sheets))
                                                @foreach($sheets as $result)
                                                    <option value="{{ $result->id }}">{{ $result->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </label>
                                </div>
                                <a href="#" class="search-advanced">+ Show More Options</a>

                                <input type="hidden" name="special_field" value="">
                                <input type="hidden" name="special_value" value="">
                                <input type="hidden" name="special_user_id" value="">

                                <button class="search_button btn-clos-green btn-search btn-clos-top">
                                    <i class="icon-search-white account-search-icon"></i>Search
                                </button>
                            <!--
                                <button class="clear_search btn-clos-lightgrey btn-clos-small btn-search btn-half-width-search btn-clos-bottom-left">Clear</button>
                            -->
                        </div>



                        <div class="results account-search-area">
                            <div class="search-box">
                                <div class="content-title">
                                    <div class="account-search-title"><span>Search</span></div>
                                     </div>

                                <div class="results-welcome">
                                    <div>
                                        <span><i class="icon-dark icon-arrow-left"></i>Please use the form on the left to search.</span>
                                    </div>
                                </div>
                                <div class="search-results">


                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><b>Charts</b></div>
                                                <div class="panel-body">
                                                    <canvas id="canvas" height="280" width="600"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

                                    <script>
                                        var myChart;
                                        var ctx;
                                        var url = "{{config('app.url')}}/search/chart";
                                        var Months = new Array();
                                        var Labels = new Array();
                                        var Prices = new Array();
                                        $(document).ready(function(){
                                            $.get(url, function(response){
                                                response.forEach(function(data){
                                                    console.log(data);
                                                    Months.push(data.data_date);
                                                    Labels.push(data.customized_name);
                                                    Prices.push(data.vals);
                                                });
                                                ctx = document.getElementById("canvas").getContext('2d');
                                                myChart = new Chart(ctx, {
                                                    type: 'bar',
                                                    data: {
                                                        labels:Months,
                                                        datasets: [{
                                                            label: 'Data Results',
                                                            data: Prices,
                                                            borderWidth: 1
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero:true
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });
                                            });
                                        });

                                        function repaintCharts(response)
                                        {
                                            Months = [];
                                            Labels = [];
                                            Prices = [];

                                            response.forEach(function(data){
                                                Months.push(data.data_date);
                                                Labels.push(data.customized_name);
                                                Prices.push(data.vals);
                                            });

                                            myChart.destroy();
                                            myChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels:Months,
                                                    datasets: [{
                                                        label: 'Data Results',
                                                        data: Prices,
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    scales: {
                                                        yAxes: [{
                                                            ticks: {
                                                                beginAtZero:true
                                                            }
                                                        }]
                                                    }
                                                }
                                            });
                                        }
                                    </script>




                                </div>

                                <div class="my-accounts">
                                    @if(isset($my_accounts))
                                        @if(!empty($my_accounts))
                                             <h3> My Accounts (assigned to me) </h3>
                                            <ul style="list-style-type: none;">
                                            @foreach($my_accounts as $result)
                                                <li style="margin: 0 0 1em 0;">
                                                    <a href="{{config('app.url')}}/account/{{ $result->account_id }}">  agentor ID: {{ $result->account_id }}  - Portfolio : {{ $result->name }} </a><br/>
                                                    {{ $result->first_name }} {{ $result->last_name }} {{ $result->home_phone }}</li>
                                            @endforeach
                                            </ul>
                                        @endif
                                    @endif

                                </div>
                            </div>

                            <div class="queue-box">
                                <div class="content-title">
                                    <div class="queue-title"><span>My Queue</span></div>
                                    <div class="toolbar">
                                        <div class="button-link-wrapper">
                                        </div>
                                    </div>

                                    <div class="hidden-fields">
                                        <input type="hidden" id="location_name" value="NNS">
                                    </div>    </div>
                                <div class="results-loading">
                                    <div class="ajax-loader-message-wrapper">
                                        <div class="ajax-loading">
                                            <span>Loading queue.  Please wait.</span>
                                            <div class="progress progress-striped active search-loading-bar">
                                                <div class="bar" style="width: 100%;"></div>
                                            </div>
                                        </div>
                                        <div class="ajax-error">
                                            <div class="error-message">
                                                <div><p class="error-boilerplate">An error has occurred.</p></div>
                                                <div class="error-messages-text"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="results-wrapper"></div>

                        </div>
                    </div>
                </div>

                <div id="debug"></div>

            </div><button class="feedback-btn feedback-btn-gray">Feedback</button></body></html>

        </div><!-- col-md-8 -->

        <!-- Right Sidebar -->
       <!--!yield('sidebar') -->



	</div><!-- row -->
@endsection

@section('after-scripts-end')
    <script>
        $('.search-advanced').html('+ Show More Options');
        $('.search-advanced').on('click', function(){
            if ($('.search-slide').slideToggle('fast')) {
                console.log($('.search-slide').is(':visible'));
                if ($('.search-slide').height() > 1) {
                    $('.search-advanced').html('+ Show More Options');
                } else {
                    $('.search-advanced').html('- Hide More Options');
                }
            }
        });

        $( "button" ).click(function() {
            $( "#add" ).toggle();
        });
//alert(window.document.location.pathname);
       // $('a[href="' + window.document.location.pathname + '"]').parents('li,ul').addClass('activesss');
    </script>

	<script>
		//Being injected from FrontendController
		//console.log(test);

        $(document).ready(function() {
            $(".search_button").click(function (e) {

                resetMsgs('.search-results', '.print-error-msg');
                e.preventDefault();

                // var _token = $("input[name='_token']").val();
                var _token = $('meta[name="_token"]').attr('content');

                // start_date, end_date, data_type, frequency
                var start_date = $("#datepicker").val();
                var end_date = $("#datepicker2").val();
                var data_type = $("#data_type").val();
                var frequency = $("#frequency").val();
                var sheet_id = $('#sheet_id').val();

                console.log(  start_date + end_date + data_type + frequency + sheet_id );

                $.ajax({
                    url: "{{config('app.url')}}/search/data",
                    type: 'POST',
                    data: {
                        _token: _token,
                        sheet_id : sheet_id,
                        start_date: start_date,
                        end_date: end_date,
                        data_type_id: data_type,
                        frequency_id: frequency
                    },
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            console.log(data);
                            repaintCharts(data);
                            $(".print-error-msg").css('display', 'none');
                            thisJson = data;
                            //newJson = JSON.parse(thisJson['success']);

                            /*var buildString = ' <h3> Search Results </h3>';
                            for (var key in newJson) {
                                if (newJson.hasOwnProperty(key)) {
                                    if (newJson[key].hasOwnProperty('id')) {
                                        buildString += '<div>';
                                        buildString += '<a href="{{config('app.url')}}/account/' + newJson[key].id + '"><strong>agentor ID:</strong>' + newJson[key].id + '</a><br/>';
                                        buildString += '<strong>First Name:</strong>' + newJson[key].first_name + '<br/>';
                                        buildString += '<strong>Last Name:</strong>' + newJson[key].last_name + '<br/>';
                                        buildString += '<strong>Original Creditor:</strong>' + newJson[key].original_creditor + '<br/>';
                                        buildString += '<strong>Original Balance:</strong>' + newJson[key].original_balance + '<br/>';
                                        buildString += '<strong>Last Payment:</strong>' + newJson[key].last_payment_amount + '<br/>';

                                        buildString += '</div>';
                                        buildString += '<div style="clear:both;padding-bottom:.5em;"></div>';
                                    }
                                }
                            }*/

                            $(".search-results").html(thisJson['success']);

                        } else {
                            console.log(data);
                            printErrorMsg('.print-error-msg', data.error);
                        }
                    }
                });
                function printErrorMsg(selector, msg) {
                    $(selector).find("ul").html('');
                    $(selector).css('display', 'block');
                    $.each(msg, function (key, value) {
                        $(selector).find("ul").append('<li>' + value + '</li>');
                    });
                }

                function resetMsgs(){
                    $(".print-error-msg").find("ul").html('');
                    $(".print-success-msg").find("ul").html('');
                    $(".print-error-msg").css('display','none');
                    $(".print-success-msg").css('display','none');
                }

            });
        });



            $( "#datepicker" ).datepicker({         onSelect: function(dateText) {
            },                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd' });


            $( "#datepicker2" ).datepicker({ onSelect: function(dateText) {
            },                 changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd' });

    </script>

@stop