<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" />

    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('description','Amazing cupcake wrappers, printable goods')">
    <meta name="keywords" content="@yield('keywords','printable, cupcake wrappers, party supplies')">
    <meta name="viewport" content="width=device-width">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('css/styles.css') }}" rel="stylesheet">
    <link href="{{ url('vendor/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">
    @yield('styles')

    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Default Description')">
    @yield('meta')

    @yield('before-styles-end')
    {!! HTML::style(elixir('css/backend.css')) !!}
    @yield('after-styles-end')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>-->
    <![endif]-->
</head>
<body class="skin-blue">
<div class="wrapper">
    @include('backend.includes.header')
    @include('backend.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('page-header')

            {{-- Change to Breadcrumbs::render() if you want it to error to remind you to create the breadcrumbs for the given route --}}
            {!! Breadcrumbs::renderIfExists() !!}
        </section>

        <!-- Main content -->
        <section class="content">
            @include('includes.partials.messages')

                @yield('content')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('backend.includes.footer')
</div><!-- ./wrapper -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>//window.jQuery || document.write('<script src="{{asset('js/vendor/jquery-1.11.2.min.js')}}"><\/script>')</script>
{!! HTML::script('js/vendor/bootstrap.min.js') !!}
<script type="text/javascript">
    var root = '{{url("/")}}';
</script>
<script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src='{{ url("vendor/selectize/js/standalone/selectize.min.js") }}'></script>
<script type="text/javascript" src='{{ url("js/main.js") }}'></script>
@yield('scripts')
@yield('before-scripts-end')
{!! HTML::script(elixir('js/backend.js')) !!}
@yield('after-scripts-end')
</body>
</html>