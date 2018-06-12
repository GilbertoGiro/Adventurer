@extends('user::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Lista de Eventos</li>
@endsection

@section('content')
    <div class="block p-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/007-global-2.png') }}" width="80px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Eventos - Lista Disponível em {{ date('d/m/Y') }}</h2>
        </div>
    </div>

    <div class="block p-md">
        <div id="events-calendar"></div>
    </div>

    <div class="active-modal"></div>
@endsection

@section('scripts')
    @include('user::event.javascript.events')
@endsection