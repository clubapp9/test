@extends('frontend.layouts.master')
@section('content')
	<div class="row">
        <!-- Parent Body Container -->
		<div class="col-md-11 col-md-offset-1">
            <!DOCTYPE html>
            <html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

                <title>My Accounts</title>

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
                <link rel="shortcut icon" href="http://192.168.0.209/favicon.ico?_dt=1526420172">


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
                                    <span>Debt ID</span>
                                    <input type="text" id="debt_id" name="debtId" class="square-input search-input">
                                </label>

                                <label>
                                    <span>SSN</span>
                                    <input type="text" id="ssn" name="ssn" class="square-input search-input">
                                </label>

                                <label>
                                    <span>Last Name</span>
                                    <input type="text" id="last_name" name="lastName" class="square-input search-input">
                                </label>

                                <label>
                                    <span>First Name</span>
                                    <input type="text" id="first_name" name="firstName" class="square-input search-input">
                                </label>

                                <label>
                                    <span>Phone</span>
                                    <input type="text" id="phone" name="phone" class="square-input search-input">
                                </label>

                                <div class="search-slide">

                                    <input type="hidden" name="search_status_code" id="search_status_code" value="1">

                                    <label>
                                        <span>Status Code</span>
                                        <select id="status_code" name="statusCode" class="square-input search-input">
                                            <option value="" selected="selected">(no status selected)</option>
                                            <option value="000">000 - Precollect</option>
                                            <option value="001">001 - NEW UNTouched account</option>
                                            <option value="002">002 - New to you REDistributed accou</option>
                                            <option value="003">003 - New no-work state</option>
                                            <option value="004">004 - NSB NEW Small Business</option>
                                            <option value="005">005 - NWS NEW No Work State</option>
                                            <option value="008">008 - New Special Employment</option>
                                            <option value="016">016 - Home Owner</option>
                                            <option value="080">080 - Experian - CASHCALL INC</option>
                                            <option value="100">100 - New Account</option>
                                            <option value="101">101 - New to you</option>
                                            <option value="102">102 - Verified Res</option>
                                            <option value="103">103 - Verified Poe</option>
                                            <option value="104">104 - Refuse to pay</option>
                                            <option value="105">105 - Left Message on Machine</option>
                                            <option value="107">107 - Dialer</option>
                                            <option value="110">110 - Active Account</option>
                                            <option value="111">111 - Charged Back Initiated</option>
                                            <option value="112">112 - Charged Back</option>
                                            <option value="113">113 - Post-dated Credit Card</option>
                                            <option value="114">114 - Scorching HOT</option>
                                            <option value="115">115 - Debtor is out to raise</option>
                                            <option value="116">116 - Promise to Pay</option>
                                            <option value="117">117 - Post Dated Check</option>
                                            <option value="118">118 - Broken Promise to Pay</option>
                                            <option value="120">120 - Partial Payment Arrangement</option>
                                            <option value="122">122 - Refi Property / Loan / or 401K</option>
                                            <option value="125">125 - Experian - SETTLED</option>
                                            <option value="126">126 - Experian - MORTGAGE(R/E,R/C)</option>
                                            <option value="127">127 - Experian - AUTO(AUT)</option>
                                            <option value="128">128 - Experian - CREDIT CARDS(CR BC)</option>
                                            <option value="129">129 - Experian - EMPLOYMENT</option>
                                            <option value="130">130 - Mgr Review</option>
                                            <option value="190">190 - Stale account</option>
                                            <option value="195">195 - Stale Small Balance</option>
                                            <option value="196">196 - Small balance</option>
                                            <option value="200">200 - Forward To Other Agency</option>
                                            <option value="210">210 - Disputed Account</option>
                                            <option value="211">211 - Charge Back Recovered</option>
                                            <option value="220">220 - Bankruptcy Filed</option>
                                            <option value="228">228 - Standard T/O</option>
                                            <option value="229">229 - Standard T/O Done</option>
                                            <option value="230">230 - Skipped Town - Tracing</option>
                                            <option value="231">231 - No active phone number</option>
                                            <option value="232">232 - Dead skip</option>
                                            <option value="26">26 - Under 26 years old</option>
                                            <option value="310">310 - Legal Action Pending</option>
                                            <option value="320">320 - Judgment Issued</option>
                                            <option value="330">330 - Judgment Payment Arrangement</option>
                                            <option value="365">365 - BAD CHECK</option>
                                            <option value="400">400 - Deceased</option>
                                            <option value="402">402 - Cease and Desist</option>
                                            <option value="403">403 - No work state</option>
                                            <option value="410">410 - Indigent</option>
                                            <option value="411">411 - Closed at Client Request</option>
                                            <option value="412">412 - Closed at Agency Request</option>
                                            <option value="413">413 - Closed Sold</option>
                                            <option value="420">420 - Bankruptcy - No Assets</option>
                                            <option value="444">444 - SSN Match</option>
                                            <option value="490">490 - Statute Closure</option>
                                            <option value="500">500 - Repossession</option>
                                            <option value="510">510 - Settled In Full</option>
                                            <option value="520">520 - Paid In Full</option>
                                            <option value="525">525 - DO NOT TOUCH</option>
                                            <option value="555">555 - Account Match</option>
                                        </select>
                                    </label>

                                    <label>
                                        <span>Client ID</span>
                                        <select id="portfolio" name="portfolio" class="square-input search-input">
                                            <option value="" selected="selected">(no client id selected)</option>

                                        @if(!empty($portfolio_ids))
                                                @foreach($portfolio_ids as $result)
                                                    <option value="{{ $result->id }}">{{ $result->name }}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </label>

                                    <label>
                                        <span>Reference No.</span>
                                        <input type="text" id="reference_number" name="referenceNo" class="square-input search-input">
                                    </label>

                                    <label>
                                        <span>State</span>
                                        <input type="text" id="state" name="state" class="square-input search-input">
                                    </label>

                                    <label>
                                        <span>Warning</span>
                                        <input type="text" id="warning" name="warning" class="square-input search-input">
                                    </label>
                                </div>

                                <a href="#" class="search-advanced">+ Show More Options</a>

                                <input type="hidden" name="special_field" value="">
                                <input type="hidden" name="special_value" value="">
                                <input type="hidden" name="special_user_id" value="">

                                <button class="search_button btn-clos-green btn-search btn-clos-top"><i class="icon-search-white account-search-icon"></i>Search</button>
                                <button class="clear_search btn-clos-lightgrey btn-clos-small btn-search btn-half-width-search btn-clos-bottom-left">Clear</button>
                                <button class="my_queue btn-clos-lightgrey btn-clos-small btn-search btn-half-width-search btn-clos-bottom-right" onclick="return false;">Queue</button>

                                <a href="http://192.168.0.209/collector_ui/search" class="decline-link" onclick="return false;">Declines</a>
                                <a href="http://192.168.0.209/collector_ui/search#" class="help-link" onclick="return false;">Help</a>


                        </div>
                        <div class="results account-search-area">

                            <div class="search-box">
                                <div class="content-title">
                                    <div class="account-search-title"><span>Account Search</span></div>
                                    <div class="toolbar">
                                        <div class="button-link-wrapper">
                                        </div>
                                    </div>

                                    <div class="hidden-fields">
                                        <input type="hidden" id="location_name" value="NNS">
                                    </div>    </div>
                                <div class="results-welcome">
                                    <div>
                                        <span><i class="icon-dark icon-arrow-left"></i>Please use the form on the left to search.</span>
                                    </div>
                                </div>
                                <div class="search-results">

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


            </div><button class="feedback-btn feedback-btn-gray">Create Ticket</button></body></html>


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

                // debt_id, ssn, first_name, last_name,phone, status_code, portfolio, warning, state, reference_number
                var debt_id = $("#debt_id").val();
                var ssn = $("#ssn").val();
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var phone = $("#phone").val();
                var status_code = $("#status_code").val();
                var portfolio = $("#portfolio").val();
                var warning = $("#warning").val();
                var state = $("#state").val();
                var reference_number = $("#reference_number").val();


                $.ajax({
                    url: "{{config('app.url')}}/search",
                    type: 'POST',
                    data: {
                        _token: _token,
                        debt_id: debt_id,
                        ssn: ssn,
                        first_name: first_name,
                        last_name: last_name,
                        portfolio: portfolio,
                        phone: phone,
                        status_code: status_code,
                        warning: warning,
                        state: state,
                        reference_number: reference_number
                    },
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            console.log(data);
                            $(".print-error-msg").css('display', 'none');
                            thisJson = data;
                            newJson = JSON.parse(thisJson['success']);

                            var buildString = ' <h3> Search Results </h3>';
                            for (var key in newJson) {
                                if (newJson.hasOwnProperty(key)) {
                                    if (newJson[key].hasOwnProperty('id')) {
                                        buildString += '<div>';
                                        buildString += '<a href="{{config('app.url')}}/account/' + newJson[key].id + '"><strong>Debtor ID:</strong>' + newJson[key].id + '</a><br/>';
                                        buildString += '<strong>First Name:</strong>' + newJson[key].first_name + '<br/>';
                                        buildString += '<strong>Last Name:</strong>' + newJson[key].last_name + '<br/>';
                                        buildString += '<strong>Original Creditor:</strong>' + newJson[key].original_creditor + '<br/>';
                                        buildString += '<strong>Original Balance:</strong>' + newJson[key].original_balance + '<br/>';
                                        buildString += '<strong>Last Payment:</strong>' + newJson[key].last_payment_amount + '<br/>';

                                        buildString += '</div>';
                                        buildString += '<div style="clear:both;padding-bottom:.5em;"></div>';
                                    }
                                }
                            }

                            $(".search-results").html(buildString);

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

    </script>

@stop