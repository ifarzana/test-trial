<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        @include('layouts.menu', ['items' => $topMenu->roots()])
                    </ul>
                </div>
            </div>
        </nav>

        <div class="wrapper">
            @yield('content')
        </div>

    </body>
</html>
