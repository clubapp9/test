<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- pass through the CSRF (cross-site request forgery) token -->
        <meta name="_token" content="{{ csrf_token() }}" />
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        @yield('meta')

        @yield('before-styles-end')
        {!! HTML::style(elixir('css/backend.css')) !!}
        @yield('after-styles-end')

        @if (\Request::is('admin/wine/import_parse') or \Request::is('admin/csvimport/import_process'))
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
            <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"
                    integrity="sha256-0vBSIAi/8FxkNOSKyPEfdGQzFDak1dlqFKBYqBp1yC4="
                    crossorigin="anonymous"></script>
        {!! HTML::script('js/vendor/bootstrap.min.js') !!}
        @endif

        <script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery-1.11.2.min.js')}}"><\/script>')</script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>-->
        <![endif]-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
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

        {!! HTML::script('js/vendor/bootstrap.min.js') !!}


        @yield('before-scripts-end')
        {!! HTML::script(elixir('js/backend.js')) !!}
        @yield('after-scripts-end')


        <style type="text/css">
            .click-animations {
                padding-bottom: 20px;
            }

            .click-animations input {
                display: block;
                margin: .5em auto;
                padding: 0.5em;
                height: 1.5em;
                width: 50%;
                font-size: 1.5em;
                outline: none;
                border: 2px solid transparent;
                transition: 0.3s;
                box-shadow: none;
                border-color: #d2d6de;
                border-top-color: rgb(210, 214, 222);
                border-right-color: rgb(210, 214, 222);
                border-bottom-color: rgb(210, 214, 222);
                border-left-color: rgb(210, 214, 222);
            }

        </style>
    </body>
</html>