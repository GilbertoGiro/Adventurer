<html>
    <head>
        <meta charset="UTF-8">
        <title>Adventurer - Usuário</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}

        <!-- Personal Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/user.css') }}">

        <!-- C3 Styles -->
        <link rel="stylesheet" href="{{ asset('c3/c3.css') }}">

        <!-- Summernote Styles -->
        <link rel="stylesheet" href="{{ asset('summernote/dist/summernote-lite.css') }}">

        <!-- FullCalendar CSS -->
        <link rel='stylesheet' href='{{ asset('fullcalendar/fullcalendar.css') }}' />

        @section('styles')
        @show

        <!-- Font Awesome Javascript -->
        <script defer src="{{ asset('fontawesome/svg-with-js/js/fontawesome-all.js') }}"></script>
    </head>
    <body style="background-color:#FFFAFA">
        <div class="application">
            <div class="application-header text-center">
                <div class="m-b-lg application-header-title" style="padding:10px;background-color:#253542;">
                    <h2 class="bold white m-t-sm">Adventurer</h2>
                </div>

                <div class="application-header-content">
                    <div class="block">
                        <div class="small-circular-image background-white">
                            <img src="{{ asset('img/adventurer.png') }}" width="135px" style="padding-left:20px;">
                        </div>

                        <a href="" class="block no-decoration milk m-t-sm">
                            Gilberto Giro Resende <i class="fa fa-user-circle"></i>
                        </a>
                    </div>

                    <div class="block m-t-lg">
                        <ul class="application-header-list m-t-sm">
                            <a href="{{ route('user.dashboard') }}" class="application-header-list-item {{ (isset($dashboard)) ? 'active' : '' }}">
                                <li>Página Inicial <i class="fas fa-home white"></i></li>
                            </a>

                            <a href="{{ route('user.suggest') }}" class="application-header-list-item {{ (isset($suggest)) ? 'active' : '' }}">
                                <li>Sugestão de Temas <i class="fa fa-question-circle white"></i></li>
                            </a>

                            <a href="{{ route('user.events') }}" class="application-header-list-item {{ (isset($event)) ? 'active' : '' }}">
                                <li>Lista de Eventos <i class="fa fa-address-book white"></i></li>
                            </a>

                            <a href="{{ route('user.configuration') }}" class="application-header-list-item {{ (isset($configuration)) ? 'active' : '' }}">
                                <li>Configurações <i class="fa fa-cogs white"></i></li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="application-body">
                <div class="application-body-header text-right">
                    <div class="inline-block left path milk">
                        @yield('path')
                    </div>

                    <div class="inline-block m-r-md action pointer notifications">
                        <i class="fa fa-user-circle milk"></i>
                    </div>

                    <div class="inline-block m-r-md action pointer notifications dropdown">
                        <i class="fa fa-bell milk"></i>

                        <div class="dropdown-items text-left">
                            <div class="block" style="border-bottom:1px solid #E0E0E0;padding:12px 3px 12px 3px;">
                                <b class="block" style="font-size:18px;">Notificações</b>
                            </div>

                            <div class="notifications overflow-auto without-scroll">
                                <div class="notification block">
                                    Você possui um conjunto de <b>5 eventos</b> para comparecer no dia de hoje.
                                </div>

                                <div class="notification block">
                                    Você possui um conjunto de <b>5 eventos</b> para comparecer no dia de hoje.
                                </div>

                                <div class="notification block">
                                    Você possui um conjunto de <b>5 eventos</b> para comparecer no dia de hoje.
                                </div>

                                <div class="notification block">
                                    Você possui um conjunto de <b>5 eventos</b> para comparecer no dia de hoje.
                                </div>

                                <div class="notification block">
                                    Você possui um conjunto de <b>5 eventos</b> para comparecer no dia de hoje.
                                </div>
                            </div>

                            <div class="block" style="border-top:1px solid #E0E0E0;padding:15px 3px 15px 3px;">
                                <span class="bold" style="font-size:15px;">
                                    © Copyright <b class="strong-blue">Adventurer</b> Reserved
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="inline-block action">
                        <a href="" class="no-decoration milk">Sair <i class="fa fa-sign-out-alt"></i></a>
                    </div>
                </div>

                <div class="application-body-content p-md">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>

    <!-- Laravel Script -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Personal Scripts -->
    <script src="{{ asset('js/modules-configuration.js') }}"></script>

    <!-- Jquery Knob Script -->
    <script src="{{ asset('js/knob/jquery.knob.min.js') }}"></script>

    <!-- C3 Script -->
    <script type="text/javascript" charset="utf-8" src="{{ asset('c3/d3.v3.min.js') }}"></script>
    <script src="{{ asset('c3/c3.min.js') }}"></script>

    <!-- Summernote Script -->
    <script type="text/javascript" src="{{ asset('summernote/dist/summernote-lite.js') }}"></script>

    <!-- FullCalendar Scripts -->
    <script src='{{ asset('fullcalendar/lib/moment.min.js') }}'></script>
    <script src='{{ asset('fullcalendar/fullcalendar.js') }}'></script>
    <script src='{{ asset('fullcalendar/locale/pt-br.js') }}'></script>

    @section('scripts')
    @show
</html>