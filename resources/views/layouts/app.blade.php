<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LT Intus</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,500&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>

    <body class="font-open app-body bg-slate-50">
        <div id="app">
            @yield('content')
        </div>
    </body>

</html>
