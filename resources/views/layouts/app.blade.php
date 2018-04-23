<html>
    <head>
        <meta charset="UTF-8">
        <title>Adventurer</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Application CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Font Awesome Javascript -->
        <script defer src="{{ asset('fontawesome/svg-with-js/js/fontawesome-all.js') }}"></script>

        <!-- FullCalendar CSS -->
        <link rel='stylesheet' href='{{ asset('fullcalendar/fullcalendar.css') }}' />
    </head>
    <body>
        <div class="application">
            <!-- Application Menu -->
            <div class="application-menu">
                <ul>
                    <li>
                        <a href="{{ route('web.index') }}">
                            <b style="font-size:21px;margin-left:20px;">Adventurer</b>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('web.event') }}">
                            Eventos Disponíveis <i class="fa fa-calendar-check"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('web.suggest') }}">
                            Sugestão de Temas <i class="fa fa-book"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('web.about-us') }}">
                            Sobre nós <i class="fa fa-users"></i>
                        </a>
                    </li>
                    <li class="right" style="margin-top:4px;">
                        <a href="{{ route('web.login') }}">
                            Login/Cadastro <i class="fa fa-user-secret"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Application Body -->
            <div class="application-body">
                @yield('content')

                @if($errors->any())
                    <div class="alert alert-{{ $errors->first('type') }}">
                        <h4 style="margin:-2px 0 4px 0;"><b>Erros encontrados</b></h4>

                        {{ $errors->first('message') }}
                    </div>
                @endif
            </div>

            <!-- Application Footer -->
            <div class="application-footer"></div>
        </div>
    </body>

    <!-- Laravel Script -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- FullCalendar Scripts -->
    <script src='{{ asset('fullcalendar/lib/moment.min.js') }}'></script>
    <script src='{{ asset('fullcalendar/fullcalendar.js') }}'></script>
    <script src='{{ asset('fullcalendar/locale/pt-br.js') }}'></script>

    @section('scripts')
    @show
</html>