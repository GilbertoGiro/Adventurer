@extends('user::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('user.theme') }}">Lista de Temas</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">{{ $theme->titulo }}</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/tasks/png/018-clipboard-1.png') }}" width="80px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm m-b-sm">Informações - {{ $theme->titulo }}</h2>
            <p class="block m-b-sm" style="margin-top:-2px;">Visualize aqui todas as informações do <b>Tema</b>.</p>
        </div>
    </div>

    <div class="p-md" style="margin-top:-5px;">
        <div class="block card m-t-sm">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Informações Completas

                    <i class="fa fa-book right" style="margin-top:3px;"></i>
                </h3>
            </div>

            <div class="card-body p-md">
                <div class="flex m-b-lg" style="justify-content:inherit;">
                    <div class="align-top m-r-lg m-l-md">
                        @if(empty($theme->photo))
                            <img src="{{ asset('img/no-image.png') }}" class="m-t-sm">
                        @else
                            <img src="{{ asset($theme->photo) }}" class="m-t-sm">
                        @endif
                    </div>
                    <div class="align-top m-t-md">
                        <div class="block m-b-md">
                            <span class="bold">Sugerida por:</span>
                            <span class="facebook-blue">
                                {{ $theme->nmusuario }}
                            </span>
                        </div>
                        <div class="block m-b-md">
                            <span class="bold">Status:</span>
                            {!! \App\Utilities\Arrays::themeStatusLabel($theme->sttema) !!}
                        </div>
                        <div class="block m-b-md">
                            <span class="bold">Enviada em:</span> {{ (new \Carbon\Carbon($theme->created_at))->format('d/m/Y H:i:s') }}
                        </div>
                        <div class="block text-justify">
                            <span class="block bold m-b-sm">Descrição:</span>
                            {!! $theme->descricao !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection