<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <section class="container px-8 py-4 mx-auto mb-5">
            <header>
                <h1>
                    <img class="inline w-12" src="/images/logo.jpg" alt="Feather logo">
                    Tweetty
                </h1>
            </header>
        </section>

        <section class="container px-8 mx-auto">
            {{ $slot }}
        </section>
    </div>

    <script src="http://unpkg.com/turbolinks"></script>
</body>
</html>
