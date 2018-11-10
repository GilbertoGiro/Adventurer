@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('admin.event') }}">Lista de Eventos</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">{{ $episode->theme->titulo }}</li>
@endsection

@php
    $theme = $episode->theme;
@endphp

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/091-mobile-web-1.png') }}" width="75px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Eventos - Gerenciar Informações</h2>
            <span class="block" style="margin-top:-3px;margin-left:4px;">
                Visualize aqui todas as informações referente ao <b>Evento</b> selecionado
            </span>
        </div>
    </div>

    <div class="p-md" style="margin-top:-4px;">
        <div class="block card m-t-sm">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Informações Completas

                    <i class="fa fa-handshake right" style="margin-top:3px;"></i>
                </h3>
            </div>

            <div class="card-body p-md">
                <div class="flex" style="justify-content:inherit;">
                    <div class="align-top m-r-lg m-l-md">
                        @if(empty($theme->photo))
                            <img src="{{ asset('img/no-image.png') }}" class="m-t-sm">
                        @else
                            <img src="{{ asset($theme->photo) }}" class="m-t-sm">
                        @endif
                    </div>
                    <div class="align-top m-t-md">
                        <div class="block m-b-md">
                            <span class="bold">Palestrante:</span>
                            <span class="facebook-blue">{{ $episode->palestrante }}</span>
                        </div>
                        <div class="block m-b-md">
                            <span class="bold">Status:</span>
                            {!! \App\Utilities\Arrays::eventStatusText($episode->stevento) !!}
                        </div>
                        <div class="block m-b-md">
                            <span class="bold">Data Prevista:</span> {{ (new \Carbon\Carbon($episode->dtprevista))->format('d/m/Y') }} às {{ $episode->hrinicio }}
                        </div>
                        <div class="block m-b-md">
                            <span class="bold">Endereço:</span> {{ \App\Utilities\Address::address($episode) }}
                        </div>
                        <div class="block text-justify">
                            <span class="block bold m-b-sm">Descrição do Tema:</span>
                            {!! $theme->descricao !!}
                        </div>
                    </div>
                </div>

                <div class="block text-right m-t-lg">
                    <button class="button button-warning m-r-sm">
                        Notificar Participantes <i class="fa fa-envelope"></i>
                    </button>

                    <button class="button button-danger m-r-sm">
                        Cancelar Evento <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection