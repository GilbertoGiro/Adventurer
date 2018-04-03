<html>
    <head>
        <meta charset="UTF-8">
        <title>Adventurer - Usuário</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Personal Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/user.css') }}">

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
                            <a href="" class="application-header-list-item active">
                                <li>Página Inicial <i class="fas fa-home white"></i></li>
                            </a>

                            <a href="" class="application-header-list-item">
                                <li>Sugestão de Temas <i class="fa fa-question-circle white"></i></li>
                            </a>

                            <a href="" class="application-header-list-item">
                                <li>Lista de Eventos <i class="fa fa-address-book white"></i></li>
                            </a>

                            <a href="" class="application-header-list-item">
                                <li>Configurações <i class="fa fa-cogs white"></i></li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="application-body">
                <div class="application-body-header">
                    <div class="path left milk">
                        @yield('path')
                    </div>

                    <div class="inline-block m-r-md action pointer notifications">
                        <i class="fa fa-user-circle milk"></i>
                    </div>

                    <div class="inline-block m-r-md action pointer notifications">
                        <i class="fa fa-bell milk"></i>
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
    <script src="{{ asset('js/user-module-configuration.js') }}"></script>

    <!-- Jquery Knob Script -->
    <script src="{{ asset('js/knob/jquery.knob.min.js') }}"></script>

    @section('scripts')
    @show
</html>