<html>
    <head>
        <meta charset="UTF-8">
        <title>Adventurer - Usuário</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('img/icon-top.png') }}">

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
                            <img src="{{ asset('img/adventurer.png') }}" width="100px" style="padding-left:10px;">
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

                            <a href="{{ route('user.theme') }}" class="application-header-list-item {{ (isset($theme)) ? 'active' : '' }}">
                                <li>Sugestão de Temas <i class="fa fa-question-circle white"></i></li>
                            </a>

                            <a href="{{ route('user.event') }}" class="application-header-list-item {{ (isset($event)) ? 'active' : '' }}">
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

                    @include('user::layouts.notification')

                    <div class="inline-block action">
                        <a href="{{ url('usuario/logout') }}" class="no-decoration milk">Sair <i class="fa fa-sign-out-alt"></i></a>
                    </div>
                </div>

                <div class="application-body-content p-md">
                    @yield('content')

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <div class="inline-block align-middle text-right m-l-sm">
                                <i class="fa fa-check m-l-sm" style="font-size:35px;"></i>
                            </div>
                            <div class="inline-block align-middle m-l-md" style="max-width:80%;margin-top:-4px !important;">
                                <div class="block" style="font-size:15px;">
                                    <span class="block">{!! session()->get('success') !!}</span>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(count($errors))
                        <div class="alert alert-{{ (!empty($errors->first('type'))) ? $errors->first('type') : 'danger' }}">
                            <div class="inline-block align-middle text-right m-l-sm">
                                <i class="fa fa-shield-alt" style="font-size:42px;"></i>
                            </div>
                            <div class="inline-block align-middle m-l-lg">
                                <div class="block m-t-sm" style="font-size:15px;">
                                    @if($errors->has('message'))
                                        <p class="m-t-sm m-b-sm">{!! $errors->first('message') !!}</p>
                                    @else
                                        @foreach($errors->all() as $error)
                                            <p class="m-t-sm m-b-sm">{!! $error !!}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
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