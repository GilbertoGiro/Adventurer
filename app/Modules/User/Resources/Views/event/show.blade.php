@extends('user::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('user.event') }}">Lista de
            Eventos</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">{{ $episode->theme->titulo }}</li>
@endsection

@php
    $subject = $episode->theme;
    $crowded = ($episode->inscriptions()->where('stinscricao', '!=', 'rep')->count()) > $episode->limite;
@endphp

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/091-mobile-web-1.png') }}" width="75px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Evento - Informações Gerais</h2>
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
                        @if(empty($subject->photo))
                            <img src="{{ asset('img/no-image.png') }}" class="m-t-sm">
                        @else
                            <img src="{{ asset($subject->photo) }}" class="m-t-sm">
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
                            <span class="bold">Data Prevista:</span> {{ (new \Carbon\Carbon($episode->dtprevista))->format('d/m/Y') }}
                            às {{ $episode->hrinicio }}
                        </div>
                        <div class="block m-b-md">
                            <span class="bold">Endereço:</span> {{ \App\Utilities\Address::address($episode) }}
                        </div>
                        <div class="block text-justify">
                            <span class="block bold m-b-sm">Descrição do Tema:</span>
                            {!! $subject->descricao !!}
                        </div>
                    </div>
                </div>

                <div class="block text-right m-t-lg">
                    <a href="{{ route('user.event') }}" class="button button-warning m-r-sm">
                        <i class="fa fa-arrow-left"></i> Voltar para o Calendário
                    </a>

                    @if($inscription || $crowded)
                        <button class="button button-success m-r-sm apply-participant disabled-button tooltip" disabled>
                            <span class="tooltiptext">
                                Inscrito <i class="fa fa-check"></i>
                            </span>
                            Solicitar Participação <i class="fa fa-thumbs-up"></i>
                        </button>
                    @else
                        <button class="button button-success m-r-sm apply-participant" data-id="{{ $episode->id }}">
                            Solicitar Participação <i class="fa fa-thumbs-up"></i>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="active-modal"></div>
@endsection

@section('scripts')
    @include('user::event.javascript.show')
@endsection