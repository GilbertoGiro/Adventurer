@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('admin.user') }}">Lista de Usuários</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">{{ $client->nome }}</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/083-address-book.png') }}" width="70px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm m-b-sm">Perfil - {{ $client->nome }}</h2>
            <p class="block m-b-sm">Visualize aqui todas as informações do <b>Usuário</b>.</p>
        </div>
    </div>

    <div class="p-md">
        <div class="card block" style="width:100%;">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Informações Completas

                    <i class="fa fa-user-circle right" style="margin-top:3px;"></i>
                </h3>
            </div>

            <div class="card-body p-md">
                <div class="inline-block align-middle p-sm m-l-md">
                    <img src="{{ asset('img/blank-profile-picture.png') }}" width="135px">
                </div>

                <div class="inline-block align-middle p-md m-l-md">
                    <span class="block"><b>Nome Completo:</b> {{ $client->nome }}</span>
                    <span class="block m-t-md"><b>E-mail:</b> {{ $client->email }}</span>
                    <span class="block m-t-md"><b>Curso:</b> {{ ($client->course) ? $client->course->nome : 'Não definido' }}</span>
                    <span class="block m-t-md"><b>Papel:</b> {{ $client->paper->nome }}</span>
                    <span class="block m-t-md"><b>Registrado em:</b> {{ (!empty($client->created_at)) ? (new \Carbon\Carbon($client->created_at))->format('d/m/Y') : 'Não informado' }}</span>
                </div>
            </div>
        </div>

        <div class="block card m-t-lg" style="width:100%;">
            <div class="card-header p-md background-weak-blue white">
                <h3 class="m-t-sm">
                    Temas Sugeridos

                    <i class="fa fa-boxes right" style="margin-top:3px;"></i>
                </h3>
            </div>

            <div class="card-body p-md">
                <table class="p-sm">
                    <thead class="background-strong-blue white">
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($client->theme))
                            @foreach($client->theme as $theme)
                                <tr class="text-center">
                                    <td>{{ $theme->titulo }}</td>
                                    <td>{{ $theme->descricao }}</td>
                                    <td>{{ (new \Carbon\Carbon($theme->created_at))->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="">
                                            <button type="button" class="button button-success circular-button tooltip">
                                                <span class="tooltiptext">Visualizar o Tema</span>

                                                <i class="fa fa-info"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="4">Este usuário não sugeriu nenhum tema</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection