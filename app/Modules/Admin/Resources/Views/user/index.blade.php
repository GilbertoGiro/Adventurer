@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Lista de Usuários</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/089-target.png') }}" width="80px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Usuários - Gerenciar Informações</h2>

            <span class="block" style="margin-top:-3px;margin-left:4px;">
                Visualize aqui todas as informações referente aos <b>Usuários</b>.
            </span>
        </div>
    </div>

    <div class="p-md">
        <div class="block text-center">
            <form>
                <div class="form-group text-left inline-block" style="width:25%;">
                    <label for="nome" class="form-label bold">Nome do Usuário</label>
                    <input type="text" name="nome" class="form-input" id="nome" placeholder="Nome do Usuário" value="{{ request('nome') }}">
                </div>

                <div class="form-group text-left inline-block m-l-md" style="width:25%;">
                    <label for="idcurso" class="form-label bold">Curso</label>
                    <select name="idcurso" class="form-input" id="idcurso">
                        <option value="">Selecione o Curso</option>
                        @foreach(\App\Utilities\Arrays::courses() as $course)
                            <option value="{{ $course['id'] }}" {{ (request('idcurso') == $course['id']) ? 'selected' : '' }}>{{ $course['nome'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group text-left inline-block m-l-md" style="width:25%;">
                    <label for="idpapel" class="form-label bold">Papel</label>
                    <select name="idpapel" class="form-input" id="idpapel">
                        <option value="">Selecione o Curso</option>
                        @foreach(\App\Utilities\Arrays::papers() as $paper)
                            <option value="{{ $paper['id'] }}" {{ (request('idpapel') == $paper['id']) ? 'selected' : '' }}>{{ $paper['nome'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group text-left inline-block m-l-md" style="width:20%;">
                    <button type="submit" class="button button-success form-input">Buscar <i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>

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
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Nome', 'nome') !!}</th>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('E-mail', 'email') !!}</th>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Curso', 'idcurso') !!}</th>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Papel', 'idpapel') !!}</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users['data']))
                            @foreach($users['data'] as $user)
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

                                        <a href="{{ route('admin.user.edit', $user->id) }}">
                                            <button class="button button-success circular-button tooltip">
                                                <span class="tooltiptext">Editar Usuário</span>

                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="5">Nenhum registro encontrado</td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right" colspan="2">Visualizando <b>{{ $users['filter'] }}</b> de <b>{{ $users['count'] }}</b> usuários</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-footer"></div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection