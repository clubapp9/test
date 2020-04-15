<?php
@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <!-- Parent Body Container -->
        <div class="col-md-11 col-md-offset-1">

            @include('frontend.includes.content_header')
            <div class="col-md-10" style="padding-top:5px;"> <strong> {{ 'Latest Accounts'  }} </strong> </div>

<!DOCTYPE html>
<!-- saved from url=(0027)http://192.168.0.209/impact -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


        <title>Impact Board</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" type="text/css" href="./Impact Board_files/general.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/jquery-ui.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/toastr.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/feedback.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/datatables.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/bootstrap-responsive.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/profile-image.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/hamburgerSlider.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/clos-buttons.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/clos-icons.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/style.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/screen.css" media="screen">
<link rel="stylesheet" type="text/css" href="./Impact Board_files/impact.css" media="screen">
        <link rel="shortcut icon" href="http://192.168.0.209/favicon.ico?_dt=1526420243">


        </head><body class="backgroundimage-blur20"><input type="hidden" id="theme_url" value="subtheme/standard/css/style.css">
        <input type="hidden" id="theme_name" value="standard">



    <input type="hidden" name="ci_csrf_token" value="14d327474b505cddd0729c745c09f27e">

<div class="container"> <!-- Start of Main Container -->

        <div class="masthead">
                    <div class="hamburger-slider-menu slide-close">
                <div class="hamburger-slider-top-area">

                    <div class="hamburger-slider-actions">
                        <div class="hamburger-slider-close-button float-left">
                            <span><i class="icon-remove"></i> Close</span>
                        </div>
                        <div class="hamburger-slider-my-account-button float-left">
                            <span><a href="http://192.168.0.209/users/profile" target="_blank"><i class="icon-user"></i> My Settings</a></span>
                        </div>
                        <div class="hamburger-slider-sign-out-button float-left">
                            <span><a href="http://192.168.0.209/logout"><i class="icon-off"></i> Log Out</a></span>
                        </div>
                    </div>

                    <div class="webui-logo-header">
                        <div class="clos-logo"></div>
                    </div>
                    <div class="sidebar-username-role-box">
                        <div class="profile-image-placeholder slidebar"></div>
                        <p class="display-name">PATRICK M. LWIN</p>
                        <p class="role-name light-grey">Super Manager</p>
                    </div>
                    <nav id="menu" class="panel hamburger-slider-links-box" role="navigation">
                        <ul class="nav nav-cui">
                            <li><a href="http://192.168.0.209/collector_ui"><span>Dashboard</span></a></li>
                                                            <li class="">
                                    <a href="http://192.168.0.209/collector_ui/search"><span>Account Search</span></a>
                                </li>
                                                            <li class="">
                                    <a href="http://192.168.0.209/billing_ui"><span>Billing</span></a>
                                </li>
                                                            <li class="">
                                    <a href="http://192.168.0.209/collector_ui/account_distribution"><span>Account Distribution </span></a>
                                </li>
                                                            <li class="">
                                    <a href="http://192.168.0.209/impact"><span>Impact</span></a>
                                </li>
                                                            <li class="">
                                    <a href="http://192.168.0.209/reports"><span>Reports</span></a>
                                </li>
                                                            <li class="">
                                    <a href="http://192.168.0.209/blog"><span>Updates / Help</span></a>
                                </li>
                                                    </ul>

                    </nav>
                </div>

                <div class="account-history" style="min-height: 80px; height: auto;">
                                <ul class="float-left">


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/193920" target="_blank">
                            <p>193920 - DEBORAH J MERHAR</p>
                            <p>2:16 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/194073" target="_blank">
                            <p>194073 - RODOLFO RODRIGUEZ</p>
                            <p>2:16 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/193709" target="_blank">
                            <p>193709 - Roy Wiggins</p>
                            <p>2:15 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/297881" target="_blank">
                            <p>297881 - TASHONDA BENOIT</p>
                            <p>2:14 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/193944" target="_blank">
                            <p>193944 - JESSICA L FAZENBAKER</p>
                            <p>2:11 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/297592" target="_blank">
                            <p>297592 - KESHAWN HARRIS</p>
                            <p>1:15 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/287629" target="_blank">
                            <p>287629 - CHRISTINA WEIGANT</p>
                            <p>1:14 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/297461" target="_blank">
                            <p>297461 - JEFFERY WILLIAMS</p>
                            <p>1:14 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/287629" target="_blank">
                            <p>287629 - CHRISTINA WEIGANT</p>
                            <p>1:13 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/76489" target="_blank">
                            <p>76489 - MARTY MARTIN</p>
                            <p>1:09 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/299336" target="_blank">
                            <p>299336 - MARTY MARTIN</p>
                            <p>1:09 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/297881" target="_blank">
                            <p>297881 - TASHONDA BENOIT</p>
                            <p>12:56 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/296784" target="_blank">
                            <p>296784 - MARCO HERRERA</p>
                            <p>12:52 PM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/271405" target="_blank">
                            <p>271405 - ANTHONY VALENZUELA</p>
                            <p>11:32 AM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/297283" target="_blank">
                            <p>297283 - CHRISTOPHER SHIRLEY</p>
                            <p>11:23 AM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/297283" target="_blank">
                            <p>297283 - CHRISTOPHER SHIRLEY</p>
                            <p>11:20 AM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/272000" target="_blank">
                            <p>272000 - ERIC MORRIS</p>
                            <p>10:20 AM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/271405" target="_blank">
                            <p>271405 - ANTHONY VALENZUELA</p>
                            <p>9:10 AM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/195198" target="_blank">
                            <p>195198 - Michael A. Alexander</p>
                            <p>8:56 AM, Tue 2018-05-15</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://192.168.0.209/collector_ui/account/194317" target="_blank">
                            <p>194317 - BILLY M HENRICKS</p>
                            <p>8:55 AM, Tue 2018-05-15</p>
                            </a>
                        </li>


                    <li><p><em>End of list.</em></p></li>

                </ul>

            </div>

                <div class="bottom-copyright">
                    <p class="light-grey">CLOS ©2018</p>
                </div>

            </div>

            <div class="hamburger-slider-button">
                <div class="hamburger-menu-button"></div>
                <div class="focus-timer-box" style="display: block;">
                    <span class="focus-timer">00:19</span>
                </div>
            </div>


            <script id="view-history-template" type="text/x-handlebars-template">
                                <ul class="float-left">
{{#if this.success}}
{{#each this.payload}}
<li>
    <a href="/collector_ui/account/{{ account_id }}" target="_blank">
        <p>{{ account_id }} - {{ account_name }}</p>
        <p>{{ timestamp }}</p>
    </a>
</li>

{{/each}}
<li><p><em>End of list.</em></p></li>
{{else}}
<li><p><em>No History.</em></p></li>
{{/if}}
</ul>

</script>

</div>

<div class="page-wrapper">
<div class="row-fluid leaderboard-area">
<div class="span3 left-leaderboard">
<div class="content-title"><span>Impact Board</span></div>
<div class="crown-area">
<div class="crown"></div>
</div>

<div class="span3 leader-box">
<div class="box-number">1</div>
<div class="profile-image-area">
<div class="profile-image-placeholder"></div>
</div>
<div class="text">
<div class="name">Christine Hansford</div>
<div class="role">Accountant</div>
<div class="amount">$1483.67</div>
<div class="collected">COLLECTED</div>
</div>
</div>

<div class="span3 leader-box">
<div class="box-number">2</div>
<div class="profile-image-area">
<div class="profile-image-placeholder"></div>
</div>
<div class="text">
<div class="name">Celeste Crummitt</div>
<div class="role">Collector</div>
<div class="amount">$950.00</div>
<div class="collected">COLLECTED</div>
</div>
</div>

<div class="span3 leader-box">
<div class="box-number">3</div>
<div class="profile-image-area">
<div class="profile-image-placeholder"></div>
</div>
<div class="text">
<div class="name">Mathew Hansford</div>
<div class="role">Collector</div>
<div class="amount">$433.67</div>
<div class="collected">COLLECTED</div>
</div>
</div>

</div>
<div class="span6 right-leaderboard">

<div class="titlebar">

<div class="content-title"><span>Performance</span></div>
<div class="leaderboard-settings-area">
<div class="leaderboard-settings" title="Settings"></div>
</div>

<div class="refresh-time-stamp">
<span class="refresh-time-text">LAST REFRESH</span>
<br>
<span class="refresh-time-time">2:37:16 PM</span>
</div>
<input type="button" class="refresh-button btn-clos-green btn-clos-small" value="Refresh">
</div>

<div id="right-leaderboard-tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all" style="display: block;">

<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
<li class="light-blue-background lbtab today-tab ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabs-today" aria-labelledby="ui-id-2" aria-selected="true"><a href="http://192.168.0.209/impact#tabs-today" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">TODAY</a></li>
<li class="light-blue-background lbtab week-tab ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-week" aria-labelledby="ui-id-3" aria-selected="false"><a href="http://192.168.0.209/impact#tabs-week" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">WEEK</a></li>
<li class="light-blue-background lbtab month-tab ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-month" aria-labelledby="ui-id-4" aria-selected="false"><a href="http://192.168.0.209/impact#tabs-month" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">MONTH</a></li>
</ul>
<div id="tabs-today" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false">
<div id="right-leaderboard-table-today_wrapper" class="dataTables_wrapper no-footer"><table id="right-leaderboard-table-today" class="lbtable tbltoday dataTable no-footer" role="grid">
<thead>
<tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="RANK" style="width: 29px;">RANK</th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 45px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="NAME" style="width: 129px;">NAME</th><th class="sorting_desc" tabindex="0" aria-controls="right-leaderboard-table-today" rowspan="1" colspan="1" aria-label="COLLECTED: activate to sort column descending" style="width: 61px;" aria-sort="descending">COLLECTED</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-today" rowspan="1" colspan="1" aria-label="ACCOUNTS: activate to sort column descending" style="width: 58px;">ACCOUNTS</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-today" rowspan="1" colspan="1" aria-label="PDC AMOUNT: activate to sort column descending" style="width: 72px;">PDC AMOUNT</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-today" rowspan="1" colspan="1" aria-label="PDC ACCOUNTS: activate to sort column descending" style="width: 83px;">PDC ACCOUNTS</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-today" rowspan="1" colspan="1" aria-label="WORKED: activate to sort column descending" style="width: 48px;">WORKED</th></tr>
</thead>
<tbody>















<tr role="row" class="odd">
<td class="">1</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Christine Hansford">
<input type="hidden" class="role" value="Accountant">
<input type="hidden" class="amount" value="1483.67">
<input type="hidden" class="accounts" value="6">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="40">
</div>
</td>
<td><div class="name">Christine Hansford</div></td>
<td class="sorting_1">1483.67</td>
<td>6</td>
<td>0.00</td>
<td>0</td>
<td>40</td>
</tr><tr role="row" class="even">
<td class="">2</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Celeste Crummitt">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="950.00">
<input type="hidden" class="accounts" value="3">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">Celeste Crummitt</div></td>
<td class="sorting_1">950.00</td>
<td>3</td>
<td>0.00</td>
<td>0</td>
<td>0</td>
</tr><tr role="row" class="odd">
<td class="">3</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Mathew Hansford">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="433.67">
<input type="hidden" class="accounts" value="1">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">Mathew Hansford</div></td>
<td class="sorting_1">433.67</td>
<td>1</td>
<td>0.00</td>
<td>0</td>
<td>0</td>
</tr><tr role="row" class="even">
<td class="">4</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Gloria R. Ruvalcava">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="100.00">
<input type="hidden" class="accounts" value="1">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">Gloria R. Ruvalcava</div></td>
<td class="sorting_1">100.00</td>
<td>1</td>
<td>0.00</td>
<td>0</td>
<td>0</td>
</tr><tr role="row" class="odd">
<td class="">5</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Alfredo C. Siller">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="0.00">
<input type="hidden" class="accounts" value="1">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="60">
</div>
</td>
<td><div class="name">Alfredo C. Siller</div></td>
<td class="sorting_1">0.00</td>
<td>1</td>
<td>0.00</td>
<td>0</td>
<td>60</td>
</tr><tr role="row" class="even">
<td class="">6</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Jeffery Bixenman">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="0.00">
<input type="hidden" class="accounts" value="1">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="71">
</div>
</td>
<td><div class="name">Jeffery Bixenman</div></td>
<td class="sorting_1">0.00</td>
<td>1</td>
<td>0.00</td>
<td>0</td>
<td>71</td>
</tr><tr role="row" class="odd">
<td class="">7</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Patrick M. Lwin">
<input type="hidden" class="role" value="Super Manager">
<input type="hidden" class="amount" value="0.00">
<input type="hidden" class="accounts" value="1">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="26">
</div>
</td>
<td><div class="name">Patrick M. Lwin</div></td>
<td class="sorting_1">0.00</td>
<td>1</td>
<td>0.00</td>
<td>0</td>
<td>26</td>
</tr></tbody>
</table></div>
</div>

<div id="tabs-week" aria-labelledby="ui-id-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
<div id="right-leaderboard-table-week_wrapper" class="dataTables_wrapper no-footer"><table id="right-leaderboard-table-week" class="lbtable tblweek dataTable no-footer" role="grid">
<thead>
<tr role="row"><th class="rank sorting_disabled" rowspan="1" colspan="1" aria-label="RANK" style="width: 0px;">RANK</th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 0px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="NAME" style="width: 0px;">NAME</th><th class="sorting_desc" tabindex="0" aria-controls="right-leaderboard-table-week" rowspan="1" colspan="1" aria-label="COLLECTED: activate to sort column descending" style="width: 0px;" aria-sort="descending">COLLECTED</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-week" rowspan="1" colspan="1" aria-label="ACCOUNTS: activate to sort column descending" style="width: 0px;">ACCOUNTS</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-week" rowspan="1" colspan="1" aria-label="PDC AMOUNT: activate to sort column descending" style="width: 0px;">PDC AMOUNT</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-week" rowspan="1" colspan="1" aria-label="PDC ACCOUNTS: activate to sort column descending" style="width: 0px;">PDC ACCOUNTS</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-week" rowspan="1" colspan="1" aria-label="WORKED: activate to sort column descending" style="width: 0px;">WORKED</th></tr>
</thead>
<tbody>



















<tr role="row" class="odd">
<td class="">1</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Christine Hansford">
<input type="hidden" class="role" value="Accountant">
<input type="hidden" class="amount" value="4099.24">
<input type="hidden" class="accounts" value="13">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="82">
</div>
</td>
<td><div class="name">Christine Hansford</div></td>
<td class="sorting_1">4099.24</td>
<td>13</td>
<td>0.00</td>
<td>0</td>
<td>82</td>
</tr><tr role="row" class="even">
<td class="">2</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Jeffery Bixenman">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="2100.56">
<input type="hidden" class="accounts" value="3">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="143">
</div>
</td>
<td><div class="name">Jeffery Bixenman</div></td>
<td class="sorting_1">2100.56</td>
<td>3</td>
<td>0.00</td>
<td>0</td>
<td>143</td>
</tr><tr role="row" class="odd">
<td class="">3</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Celeste Crummitt">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="1000.00">
<input type="hidden" class="accounts" value="5">
<input type="hidden" class="pdcs_amount" value="1490.86">
<input type="hidden" class="pdcs_accounts" value="4">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">Celeste Crummitt</div></td>
<td class="sorting_1">1000.00</td>
<td>5</td>
<td>1490.86</td>
<td>4</td>
<td>0</td>
</tr><tr role="row" class="even">
<td class="">4</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Mathew Hansford">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="458.67">
<input type="hidden" class="accounts" value="3">
<input type="hidden" class="pdcs_amount" value="2811.21">
<input type="hidden" class="pdcs_accounts" value="2">
<input type="hidden" class="accounts_worked" value="148">
</div>
</td>
<td><div class="name">Mathew Hansford</div></td>
<td class="sorting_1">458.67</td>
<td>3</td>
<td>2811.21</td>
<td>2</td>
<td>148</td>
</tr><tr role="row" class="odd">
<td class="">5</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Alfredo C. Siller">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="250.00">
<input type="hidden" class="accounts" value="2">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="133">
</div>
</td>
<td><div class="name">Alfredo C. Siller</div></td>
<td class="sorting_1">250.00</td>
<td>2</td>
<td>0.00</td>
<td>0</td>
<td>133</td>
</tr><tr role="row" class="even">
<td class="">6</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Andrew Lam">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="100.00">
<input type="hidden" class="accounts" value="1">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">Andrew Lam</div></td>
<td class="sorting_1">100.00</td>
<td>1</td>
<td>0.00</td>
<td>0</td>
<td>0</td>
</tr><tr role="row" class="odd">
<td class="">7</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Gloria R. Ruvalcava">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="100.00">
<input type="hidden" class="accounts" value="1">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">Gloria R. Ruvalcava</div></td>
<td class="sorting_1">100.00</td>
<td>1</td>
<td>0.00</td>
<td>0</td>
<td>0</td>
</tr><tr role="row" class="even">
<td class="">8</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Jonathan H. Lou">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="0.00">
<input type="hidden" class="accounts" value="2">
<input type="hidden" class="pdcs_amount" value="110.00">
<input type="hidden" class="pdcs_accounts" value="1">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">Jonathan H. Lou</div></td>
<td class="sorting_1">0.00</td>
<td>2</td>
<td>110.00</td>
<td>1</td>
<td>0</td>
</tr><tr role="row" class="odd">
<td class="">9</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Patrick M. Lwin">
<input type="hidden" class="role" value="Super Manager">
<input type="hidden" class="amount" value="0.00">
<input type="hidden" class="accounts" value="1">
<input type="hidden" class="pdcs_amount" value="120.00">
<input type="hidden" class="pdcs_accounts" value="2">
<input type="hidden" class="accounts_worked" value="51">
</div>
</td>
<td><div class="name">Patrick M. Lwin</div></td>
<td class="sorting_1">0.00</td>
<td>1</td>
<td>120.00</td>
<td>2</td>
<td>51</td>
</tr></tbody>
</table></div>
</div>

<div id="tabs-month" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
<div id="right-leaderboard-table-month_wrapper" class="dataTables_wrapper no-footer"><table id="right-leaderboard-table-month" class="lbtable tblmonth dataTable no-footer" role="grid">
<thead>
<tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="RANK" style="width: 0px;">RANK</th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 0px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="NAME" style="width: 0px;">NAME</th><th class="sorting_desc" tabindex="0" aria-controls="right-leaderboard-table-month" rowspan="1" colspan="1" aria-label="COLLECTED: activate to sort column descending" style="width: 0px;" aria-sort="descending">COLLECTED</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-month" rowspan="1" colspan="1" aria-label="ACCOUNTS: activate to sort column descending" style="width: 0px;">ACCOUNTS</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-month" rowspan="1" colspan="1" aria-label="PDC AMOUNT: activate to sort column descending" style="width: 0px;">PDC AMOUNT</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-month" rowspan="1" colspan="1" aria-label="PDC ACCOUNTS: activate to sort column descending" style="width: 0px;">PDC ACCOUNTS</th><th class="sorting_desc_disabled" tabindex="0" aria-controls="right-leaderboard-table-month" rowspan="1" colspan="1" aria-label="WORKED: activate to sort column descending" style="width: 0px;">WORKED</th></tr>
</thead>
<tbody>

























<tr role="row" class="odd">
<td class="">1</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Christine Hansford">
<input type="hidden" class="role" value="Accountant">
<input type="hidden" class="amount" value="25196.77">
<input type="hidden" class="accounts" value="40">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="458">
</div>
</td>
<td><div class="name">Christine Hansford</div></td>
<td class="sorting_1">25196.77</td>
<td>40</td>
<td>0.00</td>
<td>0</td>
<td>458</td>
</tr><tr role="row" class="even">
<td class="">2</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Mathew Hansford">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="8390.82">
<input type="hidden" class="accounts" value="13">
<input type="hidden" class="pdcs_amount" value="3011.21">
<input type="hidden" class="pdcs_accounts" value="3">
<input type="hidden" class="accounts_worked" value="574">
</div>
</td>
<td><div class="name">Mathew Hansford</div></td>
<td class="sorting_1">8390.82</td>
<td>13</td>
<td>3011.21</td>
<td>3</td>
<td>574</td>
</tr><tr role="row" class="odd">
<td class="">3</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Jeffery Bixenman">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="6978.97">
<input type="hidden" class="accounts" value="8">
<input type="hidden" class="pdcs_amount" value="700.00">
<input type="hidden" class="pdcs_accounts" value="1">
<input type="hidden" class="accounts_worked" value="626">
</div>
</td>
<td><div class="name">Jeffery Bixenman</div></td>
<td class="sorting_1">6978.97</td>
<td>8</td>
<td>700.00</td>
<td>1</td>
<td>626</td>
</tr><tr role="row" class="even">
<td class="">4</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Celeste Crummitt">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="6796.12">
<input type="hidden" class="accounts" value="13">
<input type="hidden" class="pdcs_amount" value="1490.86">
<input type="hidden" class="pdcs_accounts" value="4">
<input type="hidden" class="accounts_worked" value="414">
</div>
</td>
<td><div class="name">Celeste Crummitt</div></td>
<td class="sorting_1">6796.12</td>
<td>13</td>
<td>1490.86</td>
<td>4</td>
<td>414</td>
</tr><tr role="row" class="odd">
<td class="">5</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Alfredo C. Siller">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="3540.75">
<input type="hidden" class="accounts" value="7">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="363">
</div>
</td>
<td><div class="name">Alfredo C. Siller</div></td>
<td class="sorting_1">3540.75</td>
<td>7</td>
<td>0.00</td>
<td>0</td>
<td>363</td>
</tr><tr role="row" class="even">
<td class="">6</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Anacelia Zamudio">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="804.60">
<input type="hidden" class="accounts" value="2">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="159">
</div>
</td>
<td><div class="name">Anacelia Zamudio</div></td>
<td class="sorting_1">804.60</td>
<td>2</td>
<td>0.00</td>
<td>0</td>
<td>159</td>
</tr><tr role="row" class="odd">
<td class="">7</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Andrew Lam">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="100.00">
<input type="hidden" class="accounts" value="1">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">Andrew Lam</div></td>
<td class="sorting_1">100.00</td>
<td>1</td>
<td>0.00</td>
<td>0</td>
<td>0</td>
</tr><tr role="row" class="even">
<td class="">8</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Gloria R. Ruvalcava">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="100.00">
<input type="hidden" class="accounts" value="1">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">Gloria R. Ruvalcava</div></td>
<td class="sorting_1">100.00</td>
<td>1</td>
<td>0.00</td>
<td>0</td>
<td>0</td>
</tr><tr role="row" class="odd">
<td class="">9</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Patrick M. Lwin">
<input type="hidden" class="role" value="Super Manager">
<input type="hidden" class="amount" value="75.00">
<input type="hidden" class="accounts" value="2">
<input type="hidden" class="pdcs_amount" value="270.00">
<input type="hidden" class="pdcs_accounts" value="5">
<input type="hidden" class="accounts_worked" value="198">
</div>
</td>
<td><div class="name">Patrick M. Lwin</div></td>
<td class="sorting_1">75.00</td>
<td>2</td>
<td>270.00</td>
<td>5</td>
<td>198</td>
</tr><tr role="row" class="even">
<td class="">10</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="David Vaca">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="50.00">
<input type="hidden" class="accounts" value="1">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">David Vaca</div></td>
<td class="sorting_1">50.00</td>
<td>1</td>
<td>0.00</td>
<td>0</td>
<td>0</td>
</tr><tr role="row" class="odd">
<td class="">11</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Ryan Chao">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="12.50">
<input type="hidden" class="accounts" value="2">
<input type="hidden" class="pdcs_amount" value="0.00">
<input type="hidden" class="pdcs_accounts" value="0">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">Ryan Chao</div></td>
<td class="sorting_1">12.50</td>
<td>2</td>
<td>0.00</td>
<td>0</td>
<td>0</td>
</tr><tr role="row" class="even">
<td class="">12</td>
<td>
<div class="profile-image-placeholder"></div>
<div style="display: none;" class="leader_info">
<div class="image_style" "=""></div>
<input type="hidden" class="display_name" value="Jonathan H. Lou">
<input type="hidden" class="role" value="Collector">
<input type="hidden" class="amount" value="0.00">
<input type="hidden" class="accounts" value="2">
<input type="hidden" class="pdcs_amount" value="110.00">
<input type="hidden" class="pdcs_accounts" value="1">
<input type="hidden" class="accounts_worked" value="0">
</div>
</td>
<td><div class="name">Jonathan H. Lou</div></td>
<td class="sorting_1">0.00</td>
<td>2</td>
<td>110.00</td>
<td>1</td>
<td>0</td>
</tr></tbody>
</table></div>
</div>

</div>
</div>
</div>

<div style="display: none;">
<div id="leaderboard-settings-dialog" title="SELECT ROTATION">
<div class="row-fluid">
<div class="span4 settings-left">
<label>
<input type="checkbox" id="settings-today" class="setting-checkbox">
<span>TODAY</span>
</label>
<label>
<input type="checkbox" id="settings-week" class="setting-checkbox">
<span>WEEK</span>
</label>
<label>
<input type="checkbox" id="settings-month" class="setting-checkbox">
<span>MONTH</span>
</label>
</div>
<div class="span4 settings-right">
<label>
<input type="checkbox" id="settings-collected" class="setting-checkbox">
<span>COLLECTED</span>
</label>
<label>
<input type="checkbox" id="settings-accounts" class="setting-checkbox">
<span>ACCOUNTS</span>
</label>
<label>
<input type="checkbox" id="settings-pdcs-amount" class="setting-checkbox">
<span>PDC AMOUNT</span>
</label>
<label>
<input type="checkbox" id="settings-pdcs-account" class="setting-checkbox">
<span>PDC ACCOUNT</span>
</label>
<label>
<input type="checkbox" id="settings-touched" class="setting-checkbox">
<span>WORKED</span>
</label>
</div>
</div>
<br>
<div class="row-fluid">
<div class="settings-dropdown">
<label>Rotation Timer</label>
<select id="settings-rotation">
<option value="10s" selected="selected">10 seconds</option>
<option value="20s">20 seconds</option>
<option value="30s">30 seconds</option>
<option value="1m">1 minute</option>
<option value="2m">2 minutes</option>
<option value="5m">5 minutes</option>
</select>
</div>
<div class="settings-dropdown">
<label>Refresh Timer</label>
<select id="settings-refresh">
<option value="1" selected="selected">1 minute</option>
<option value="2">2 minutes</option>
<option value="5">5 minutes</option>
<option value="10">10 minutes</option>
</select>
</div>
</div>
</div>
</div>

<script id="left-leaderboard-template" type="text/x-handlebars-template">
<div class="content-title"><span>Impact Board</span></div>
<div class="crown-area">
<div class="crown"></div>
</div>
{{#each this.data}}
<div class="span3 leader-box">
<div class="box-number">{{rank}}</div>
<div class="profile-image-area">
<div class="profile-image-placeholder" {{{image_style}}}></div>
</div>
<div class="text">
<div class="name">{{display_name}}</div>
<div class="role">{{role}}</div>
<div class="amount">{{amount}}</div>
<div class="collected">{{sort}}</div>
</div>
</div>
{{/each}}
</script>

<script id="right-leaderboard-template-today" type="text/x-handlebars-template">
    <table id="right-leaderboard-table-today" class="lbtable tbltoday">
        <thead>
        <tr>
            <th>RANK</th>
            <th></th>
            <th>NAME</th>
            <th>COLLECTED</th>
            <th>ACCOUNTS</th>
            <th>PDC AMOUNT</th>
            <th>PDC ACCOUNTS</th>
            <th>WORKED</th>
        </tr>
        </thead>
        <tbody>
        {{#each this}}
        <tr>
            <td></td>
            <td>
                <div class="profile-image-placeholder" {{{image_style}}}></div>
                <div style="display: none;" class="leader_info">
                    <div class="image_style" {{{image_style}}}"></div>
                <input type="hidden" class="display_name" value="{{display_name}}">
                <input type="hidden" class="role" value="{{role}}">
                <input type="hidden" class="amount" value="{{amount}}">
                <input type="hidden" class="accounts" value="{{accounts}}">
                <input type="hidden" class="pdcs_amount" value="{{pdcs_amount}}">
                <input type="hidden" class="pdcs_accounts" value="{{pdcs_accounts}}">
                <input type="hidden" class="accounts_worked" value="{{accounts_worked}}">
                </div>
            </td>
            <td><div class="name">{{display_name}}</div></td>
            <td>{{amount}}</td>
            <td>{{accounts}}</td>
            <td>{{pdcs_amount}}</td>
            <td>{{pdcs_accounts}}</td>
            <td>{{accounts_worked}}</td>
        </tr>
        {{/each}}
        </tbody>
    </table>
</script>

<script id="right-leaderboard-template-week" type="text/x-handlebars-template">
    <table id="right-leaderboard-table-week" class="lbtable tblweek">
        <thead>
        <tr>
            <th class="rank">RANK</th>
            <th></th>
            <th>NAME</th>
            <th>COLLECTED</th>
            <th>ACCOUNTS</th>
            <th>PDC AMOUNT</th>
            <th>PDC ACCOUNTS</th>
            <th>WORKED</th>
        </tr>
        </thead>
        <tbody>
        {{#each this}}
        <tr>
            <td></td>
            <td>
                <div class="profile-image-placeholder" {{{image_style}}}></div>
                <div style="display: none;" class="leader_info">
                    <div class="image_style" {{{image_style}}}"></div>
                <input type="hidden" class="display_name" value="{{display_name}}">
                <input type="hidden" class="role" value="{{role}}">
                <input type="hidden" class="amount" value="{{amount}}">
                <input type="hidden" class="accounts" value="{{accounts}}">
                <input type="hidden" class="pdcs_amount" value="{{pdcs_amount}}">
                <input type="hidden" class="pdcs_accounts" value="{{pdcs_accounts}}">
                <input type="hidden" class="accounts_worked" value="{{accounts_worked}}">
                </div>
            </td>
            <td><div class="name">{{display_name}}</div></td>
            <td>{{amount}}</td>
            <td>{{accounts}}</td>
            <td>{{pdcs_amount}}</td>
            <td>{{pdcs_accounts}}</td>
            <td>{{accounts_worked}}</td>
        </tr>
        {{/each}}
        </tbody>
    </table>
</script>

<script id="right-leaderboard-template-month" type="text/x-handlebars-template">
    <table id="right-leaderboard-table-month" class="lbtable tblmonth">
        <thead>
        <tr>
            <th>RANK</th>
            <th></th>
            <th>NAME</th>
            <th>COLLECTED</th>
            <th>ACCOUNTS</th>
            <th>PDC AMOUNT</th>
            <th>PDC ACCOUNTS</th>
            <th>WORKED</th>
        </tr>
        </thead>
        <tbody>
        {{#each this}}
        <tr>
            <td></td>
            <td>
                <div class="profile-image-placeholder" {{{image_style}}}></div>
                <div style="display: none;" class="leader_info">
                    <div class="image_style" {{{image_style}}}"></div>
                <input type="hidden" class="display_name" value="{{display_name}}">
                <input type="hidden" class="role" value="{{role}}">
                <input type="hidden" class="amount" value="{{amount}}">
                <input type="hidden" class="accounts" value="{{accounts}}">
                <input type="hidden" class="pdcs_amount" value="{{pdcs_amount}}">
                <input type="hidden" class="pdcs_accounts" value="{{pdcs_accounts}}">
                <input type="hidden" class="accounts_worked" value="{{accounts_worked}}">
                </div>
            </td>
            <td><div class="name">{{display_name}}</div></td>
            <td>{{amount}}</td>
            <td>{{accounts}}</td>
            <td>{{pdcs_amount}}</td>
            <td>{{pdcs_accounts}}</td>
            <td>{{accounts_worked}}</td>
        </tr>
        {{/each}}
        </tbody>
    </table>
</script>









<div id="loading-dialog" class="dialog" title="Loading...">
    <div class="flex-container">
        <div class="flex-item item-1 add-notes-fields form-group">
            <div class="general-loader">
                <p>
                </p><div class="ajax-loader-transparent"></div>
                <span>Please wait while your action is being processed...</span>
                <p></p>
                <p>
                    <span class="extra-stuff"></span>
                </p>
            </div>
        </div>
    </div>
</div>


<div id="debug"></div>
<script src="./Impact Board_files/jquery-1.7.2.min.js.download"></script>
<script src="./Impact Board_files/bootstrap.min.js.download"></script>
<script type="text/javascript" src="./Impact Board_files/jquery-ui.js.download"></script>
<script type="text/javascript" src="./Impact Board_files/toastr.min.js.download"></script>
<script type="text/javascript" src="./Impact Board_files/feedback.js.download"></script>
<script type="text/javascript" src="./Impact Board_files/datatables.js.download"></script>
<script type="text/javascript" src="./Impact Board_files/handlebars-v1.3.0.js.download"></script>
<script type="text/javascript" src="./Impact Board_files/general.js.download"></script>
<script type="text/javascript" src="./Impact Board_files/bootstrap.min.js(1).download"></script>
<script type="text/javascript" src="./Impact Board_files/hamburgerSlider.js.download"></script>
<script type="text/javascript" src="./Impact Board_files/impact.js.download"></script>
<script type="text/javascript">
    $(document).ready(function(){


        $(".dropdown-toggle").dropdown();$(".tooltips").tooltip();

    });

</script>


</div></div><button class="feedback-btn feedback-btn-gray">Create Ticket</button></body></html>


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
    </script>
@stop