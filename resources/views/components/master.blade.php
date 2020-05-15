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
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.css') }}"  >
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

    <!-- Notifications ---------------------------------------------------------------------------->
    <script>
        toastr.options.positionClass = 'toast-bottom-right';
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
</body>
</html>
