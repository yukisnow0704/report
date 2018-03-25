<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="{{ asset('libs/assets/animate.css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('libs/assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('libs/assets/simple-line-icons/css/simple-line-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('libs/jquery/bootstrap/dist/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/anguly.css') }}" type="text/css" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('libs/jquery/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/ui-load.js') }}"></script>
    <script src="{{ asset('js/ui-jp.config.js') }}"></script>
    <script src="{{ asset('js/ui-jp.js') }}"></script>
    <script src="{{ asset('js/ui-nav.js') }}"></script>
    <script src="{{ asset('js/ui-toggle.js') }}"></script>
    <script src="{{ asset('js/ui-client.js') }}"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
</head>
<body>

    <div class="app app-header-fixed ">
        <div id="content" class="app-content-body ">
            @yield('content')
        </div>
        <textarea id="tmp-memo" style="height:150px;"></textarea>
    </div>

    <style>
    #content {
        padding-bottom: 100px;
    }
    #tmp-memo {
        position: fixed;
        bottom: 0;
        right: 0;
        width:100%;
    }

    </style>
</body>
</html>
