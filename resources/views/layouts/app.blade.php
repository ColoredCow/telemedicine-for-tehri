<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> 555 - ASHA </title>
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <!-- Scripts -->
        <script>
        window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>

        </script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      
        @yield('imports')
    </head>
    <body>
        <div id="app">
           @include('layouts.header')

           <div id="app-container" class="container" style="margin-top:6em">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 hidden-xs  inner-left-container" id="sidebar">
                    @include('layouts.sidebar')
                    </div>
                    <div class="col-xs-12 col-sm-9 inner-right-container" id="main-content">
                        <span class="content_section"> @yield('content') </span>
                    </div>
                </div>
           </div>
           
           @include('layouts.footer')

        </div>

        <!-- Scripts -->
<!--         <script src="/js/app.js"></script> -->

            <script src="{{ mix('/js/app.js') }}"></script>
     
    </body>
</html>