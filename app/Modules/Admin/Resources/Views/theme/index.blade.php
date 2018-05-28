@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Lista de Temas</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/091-mobile-web-1.png') }}" width="75px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Temas - Gerenciar Informações</h2>
        </div>
    </div>

    <div class="p-md">
        <div class="block text-center">
            <form action="">
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
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Enviada por</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($themes['data']))
                            @foreach($themes['data'] as $theme)
                                <tr class="text-center">
                                    <td>{{ $theme->titulo }}</td>
                                    <td>{{ $theme->descricao }}</td>
                                    <td>{{ $theme->nmusuario }}</td>
                                    <td>{{ $theme->sttema }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.show', $theme->id) }}" class="text-decoration-none">
                                            <button class="button button-info circular-button tooltip">
                                                <span class="tooltiptext">Visualizar Usuário</span>

                                                <i class="fa fa-address-book"></i>
                                            </button>
                                        </a>

                                        <a href="{{ route('admin.user.edit', $theme->id) }}">
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
                            <td class="text-right" colspan="2">Visualizando <b>{{ $themes['filter'] }}</b> de <b>{{ $themes['count'] }}</b> temas</td>
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