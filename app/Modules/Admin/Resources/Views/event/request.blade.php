@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Lista de Eventos</li>
@endsection

@php
    $theme = $event->theme;
@endphp

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/091-mobile-web-1.png') }}" width="75px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Eventos - Solicitações de Aprovação</h2>
            <span class="block" style="margin-top:-3px;margin-left:4px;">
                Visualize aqui todas as solicitações de participação referente ao <b>Evento</b> em questão
            </span>
        </div>
    </div>

    <div class="p-md" style="margin-top:-20px;">
        <div class="card block m-t-md">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm m-b-sm">
                    Solicitações de Participação
                    <i class="fa fa-users right" style="margin-top:2px;"></i>
                </h3>
            </div>
            <div class="card-body p-md">
                <table>
                    <thead class="background-strong-blue white">
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Aluno</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event->inscriptions as $inscription)
                            <tr class="text-center">
                                <td>
                                    {{ $inscription->user->nome }}
                                </td>
                                <td>
                                    {{ $inscription->user->email }}
                                </td>
                                <td>
                                    {{ ($inscription->user) ? ($inscription->user->flexterno === 'n') ? 'Sim' : 'Não' : 'Não' }}
                                </td>
                                <td>
                                    {!! \App\Utilities\Arrays::inscriptionStatusLabel($inscription->stinscricao) !!}
                                </td>
                                <td>
                                    <button class="button button-success circular-button tooltip">
                                        <span class="tooltiptext">Aprovar</span>
                                        <i class="fa fa-thumbs-up"></i>
                                    </button>

                                    <button class="button button-danger circular-button tooltip">
                                        <span class="tooltiptext">Reprovar</span>
                                        <i class="fa fa-thumbs-down"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin::event.javascript.index')
@endsection