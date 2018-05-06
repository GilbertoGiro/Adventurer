<html>
    <head>
        <title>Adventurer - Página de Login</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Font Awesome Javascript -->
        <script defer src="{{ asset('fontawesome/svg-with-js/js/fontawesome-all.js') }}"></script>
    </head>
    <body style="background-color:#FFFAFA">
        @yield('content')

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

        <div class="active-modal"></div>
    </body>

    <!-- Laravel Script -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Personal Scripts -->
    <script src="{{ asset('js/modules-configuration.js') }}"></script>

    @section('scripts')
    @show
</html>