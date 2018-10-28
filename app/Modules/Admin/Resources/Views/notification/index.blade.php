@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Notificações</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/tasks/png/026-smartphone-1.png') }}" width="80px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Notificações - Gerenciar Informações</h2>

            <span class="block" style="margin-top:-3px;margin-left:4px;">
                Visualize aqui todas as informações referente as <b>Notificações</b>.
            </span>
        </div>
    </div>

    <div class="p-md" style="margin-top:-20px;">
        <div class="block text-center">
            <form class="table-fixed">
                <div class="form-group text-left table-cell p-sm">
                    <label for="titulo" class="form-label bold">Título</label>
                    <input type="text" name="titulo" class="form-input" id="titulo" placeholder="Título da Notificação" value="{{ request('titulo') }}">
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label for="idusuario" class="form-label bold">Usuário</label>
                    <select name="idusuario" class="form-input" id="idusuario">
                        <option value="">Selecione o Usuário</option>
                        @foreach(\App\Utilities\Arrays::admins() as $admin)
                            <option value="{{ $admin['id'] }}" {{ (request('idusuario') == $admin['id']) ? 'selected' : '' }}>{{ $admin['nome'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label for="stnotificacao" class="form-label bold">Status</label>
                    <select name="stnotificacao" class="form-input" id="stnotificacao">
                        <option value="">Selecione o Status</option>
                        @foreach(\App\Utilities\Arrays::status() as $key => $status)
                            <option value="{{ $key }}" {{ (request('stnotificacao') == $key) ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label class="form-label bold">Buscar</label>
                    <button type="submit" class="button button-success form-input">Buscar <i class="fa fa-search"></i></button>
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label class="form-label bold">Adicionar</label>
                    <a href="{{ route('admin.notification.create') }}">
                        <button type="button" class="button background-strong-blue white form-input">Nova Notificação <i class="fa fa-envelope"></i></button>
                    </a>
                </div>
            </form>
        </div>

        <div class="card block m-t-sm">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm bold">
                    Lista de Notificações

                    <i class="fa fa-users right" style="margin-top:3px"></i>
                </h3>
            </div>

            <div class="card-body p-md">
                <table>
                    <thead class="background-strong-blue white">
                        <tr>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Título', 'titulo') !!}</th>
                            <th>Usuário</th>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Status', 'stnotificacao') !!}</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($communications['data']))
                            @foreach($communications['data'] as $notification)
                                <tr class="text-center">
                                    <td>{{ $notification->titulo }}</td>
                                    <td>{{ $notification->user->nome }}</td>
                                    <td>{!! \App\Utilities\Arrays::notificationStatusLabel($notification->stnotificacao) !!}</td>
                                    <td>
                                        <a href="{{ route('admin.notification.show', $notification->id) }}" class="text-decoration-none">
                                            <button class="button button-info circular-button tooltip">
                                                <span class="tooltiptext">Visualizar Notificação</span>

                                                <i class="fa fa-book"></i>
                                            </button>
                                        </a>

                                        <a href="{{ route('admin.notification.edit', $notification->id) }}" class="text-decoration-none">
                                            <button class="button button-warning circular-button tooltip">
                                                <span class="tooltiptext">Editar Notificação</span>

                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="4">Nenhum registro encontrado</td>
                            </tr>
                        @endif
                        <tr>
                            <td class="text-right" colspan="4">Visualizando <b>{{ $communications['filter'] }}</b> de <b>{{ $communications['count'] }}</b> notificações</td>
                        </tr>
                    </tbody>
                </table>

                {{ (!empty($communications['data'])) ? $communications['data']->links() : '' }}
            </div>

            <div class="card-footer"></div>
        </div>
    </div>
@endsection