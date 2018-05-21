@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Lista de Usuários</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/083-address-book.png') }}" width="70px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Usuários - Gerenciar Informações</h2>
        </div>
    </div>

    <div class="p-md">
        <div class="card block m-t-sm">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm bold">
                    Lista de Usuários

                    <i class="fa fa-users right" style="margin-top:3px"></i>
                </h3>
            </div>

            <div class="card-body p-md">
                <table>
                    <thead class="background-strong-blue white">
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Curso</th>
                            <th>Papel</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="text-center">
                                <td>{{ $user->nome }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ (!empty($user->course)) ? $user->course->nome : 'Não informado' }}</td>
                                <td>{{ $user->paper->nome }}</td>
                                <td>
                                    <a href="{{ route('admin.user.show', $user->id) }}" class="text-decoration-none">
                                        <button class="button button-info circular-button tooltip">
                                            <span class="tooltiptext">Visualizar Usuário</span>

                                            <i class="fa fa-address-book"></i>
                                        </button>
                                    </a>

                                    <button class="button button-success circular-button tooltip">
                                        <span class="tooltiptext">Editar Usuário</span>

                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer"></div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection