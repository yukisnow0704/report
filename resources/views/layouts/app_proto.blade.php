<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="../libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="../libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />

    <link rel="stylesheet" href="../libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link rel="stylesheet" href="css/anguly.css" type="text/css" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>

    <div class="app app-header-fixed ">
        @include("/layouts/header")
        @include("/layouts/navbar")

        <div id="content" class="app-content" role="main">
            <div class="app-content-body ">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="../libs/jquery/jquery/dist/jquery.js"></script>
    <script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
    <script src="../js/ui-load.js"></script>
    <script src="../js/ui-jp.config.js"></script>
    <script src="../js/ui-jp.js"></script>
    <script src="../js/ui-nav.js"></script>
    <script src="../js/ui-toggle.js"></script>
    <script src="../js/ui-client.js"></script>

</body>
</html>
