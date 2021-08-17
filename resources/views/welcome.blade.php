<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}

        {{-- <link href="{{ mix('/css/app.css') }}" rel="stylesheet"> --}}

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

</head>
<body>
    <div id="app">
        <p>hello</p>
        <router-view></router-view>
    </div>
    <script type="text/javascript" src="{{ mix('/public/app.js') }}" defer></script>
    
    </body>
</html>
