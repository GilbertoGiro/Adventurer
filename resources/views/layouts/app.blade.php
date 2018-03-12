<html>
    <head>
        <meta charset="UTF-8">
        <title>Adventurer</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Application CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Google Fonts -->
        <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Roboto%3A300%2C400%7CRaleway%3A400%2C500%2C900&#038;ver=3.1' type='text/css' media='all'/>
    </head>
    <body>
        <!-- Application Menu -->
        <div class="application-menu">
            <ul>
                <li>Página Inicial</li>
                <li>Eventos</li>
                <li>Sobre nós</li>
                <li>Login</li>
            </ul>
        </div>

        <!-- Application Body -->
        <div class="application-body">
            @yield('content')
        </div>
    </body>

    <!-- Laravel Javascript -->
    <script src="{{ asset('js/app.js') }}"></script>

    @section('scripts')
    @show
</html>