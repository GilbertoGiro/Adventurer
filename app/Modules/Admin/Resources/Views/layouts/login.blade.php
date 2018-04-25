<html>
    <head>
        <title>Adventurer - Página de Login</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Font Awesome Javascript -->
        <script defer src="{{ asset('fontawesome/svg-with-js/js/fontawesome-all.js') }}"></script>
    </head>
    <body style="background-color:#FFFAFA">
        @yield('content')

        @if($errors->any())
            <div class="alert alert-{{ $errors->first('type') }}">
                {{ $errors->first('message') }}
            </div>
        @endif
    </body>
</html>