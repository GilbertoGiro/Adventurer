@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('admin.notification') }}">Lista de Notificações</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">{{ $notify->titulo }}</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/tasks/png/026-smartphone-1.png') }}" width="80px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Notificações - Adicionar Notificação</h2>

            <span class="block" style="margin-top:-3px;margin-left:4px;">
                Visualize aqui todas as informações referente às <b>Notificações</b>.
            </span>
        </div>
    </div>

    <div class="p-md">
        <div class="card" style="width:100%;">
            <div class="card-header background-strong-blue white">
                <h3 class="m-t-sm m-b-sm">
                    Informações Completas

                    <i class="fa fa-envelope right" style="margin-top:2px;"></i>
                </h3>
            </div>
            <div class="card-body" style="padding: 18px;">
                <div class="block m-b-md">
                    <span class="bold">Título:</span> {{ $notify->titulo }}
                </div>
                <div class="block m-b-md">
                    <span class="bold">Status:</span>
                    {!! \App\Utilities\Arrays::notificationStatusLabel($notify->stnotificacao) !!}
                </div>
                <div class="block m-b-md">
                    <span class="bold">Criada em:</span> {{ (new \Carbon\Carbon($notify->created_at))->format('d/m/Y H:i:s') }}
                </div>
                <div class="block text-justify">
                    <span class="block bold m-b-sm">Corpo:</span>
                    {!! $notify->corpo !!}
                </div>
            </div>
        </div>
    </div>
@endsection