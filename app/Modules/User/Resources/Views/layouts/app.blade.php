<html>
    <head>
        <title>Adventurer - Usuário</title>

        <!-- Personal Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/user.css') }}">

        <!-- Font Awesome Javascript -->
        <script defer src="{{ asset('fontawesome/svg-with-js/js/fontawesome-all.js') }}"></script>

    </head>
    <body>
        <div class="application">
            <div class="application-header text-center">
                <div class="m-b-lg" style="padding:10px;background-color:#253542;">
                    <h2 class="bold white m-t-sm">Adventurer</h2>
                </div>

                <div class="application-header-content">
                    <div class="small-circular-image background-white">
                        <img src="{{ asset('img/adventurer.png') }}" width="135px" style="padding-left:20px;">
                    </div>

                    <div class="block m-t-lg">
                        <ul class="application-header-list m-t-sm">
                            <a href="" class="application-header-list-item">
                                <li>Página Inicial <i class="fas fa-home white"></i></li>
                            </a>

                            <a href="" class="application-header-list-item">
                                <li>Sugestão de Temas <i class="fa fa-question-circle white"></i></li>
                            </a>

                            <a href="" class="application-header-list-item">
                                <li>Lista de Eventos <i class="fa fa-address-book white"></i></li>
                            </a>

                            <a href="" class="application-header-list-item">
                                <li>Configurações <i class="fa fa-address-book white"></i></li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="application-body">
                @yield('content')
            </div>
        </div>
    </body>

    @section('scripts')
    @show
</html>