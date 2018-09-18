@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Lista de Temas</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/tasks/png/017-inbox.png') }}" width="75px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Temas - Gerenciar Informações</h2>
            <span class="block" style="margin-top:-3px;margin-left:4px;">
                Visualize aqui todas as informações referente às <b>Sugestões de Tema</b> enviadas por usuários da aplicação
            </span>
        </div>
    </div>

    <div class="p-md" style="margin-top:-20px;">
        <div class="block text-center">
            <form class="table-fixed">
                <div class="form-group text-left table-cell p-sm">
                    <label for="titulo" class="form-label bold">Título</label>
                    <input type="text" name="titulo" class="form-input" id="titulo" placeholder="Título do Tema" value="{{ request('titulo') }}">
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label for="nmusuario" class="form-label bold">Usuário</label>
                    <input type="text" name="nmusuario" class="form-input" id="nmusuario" placeholder="Nome do Usuário" value="{{ request('nmusuario') }}">
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label for="sttema" class="form-label bold">Status</label>
                    <select name="sttema" class="form-input" id="sttema">
                        <option value="">Selecione o Curso</option>
                        <option value="abe" {{ (request('sttema') === 'abe') ? 'selected' : '' }}>Aberto</option>
                        <option value="apr" {{ (request('sttema') === 'apr') ? 'selected' : '' }}>Aprovado</option>
                        <option value="rep" {{ (request('sttema') === 'rep') ? 'selected' : '' }}>Reprovado</option>
                    </select>
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label class="form-label bold">Buscar</label>
                    <button type="submit" class="button button-success form-input">Buscar <i class="fa fa-search"></i></button>
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label class="form-label bold">Adicionar</label>
                    <a href="{{ route('admin.suggest.create') }}">
                        <button type="button" class="button background-strong-blue white form-input">Novo Tema <i class="fa fa-book"></i></button>
                    </a>
                </div>
            </form>
        </div>

        <div class="card block m-t-sm">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm bold">
                    Lista de Temas

                    <i class="fas fa-envelope-square right" style="font-size:24px;"></i>
                </h3>
            </div>

            <div class="card-body p-md">
                <table>
                    <thead class="background-strong-blue white">
                        <tr>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Título', 'titulo') !!}</th>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Enviada por', 'nmusuario') !!}</th>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Status', 'sttema') !!}</th>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Criado em', 'created_at') !!}</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($themes['data']))
                            @foreach($themes['data'] as $theme)
                                <tr class="text-center">
                                    <td>{{ $theme->titulo }}</td>
                                    <td>{{ $theme->nmusuario }}</td>
                                    <td>{!! ($theme->sttema !== 'abe') ? ($theme->sttema !== 'apr') ? '<span class="label white background-red">Reprovado</span>' : '<span class="label white background-green">Aprovado</span>' : '<span class="label white background-gold">Aberto</span>' !!}</td>
                                    <td>{{ (new \Carbon\Carbon($theme->created_at))->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.suggest.show', $theme->id) }}" class="text-decoration-none">
                                            <button class="button button-info circular-button tooltip">
                                                <span class="tooltiptext">Visualizar Tema</span>

                                                <i class="fa fa-book"></i>
                                            </button>
                                        </a>

                                        @if($theme->sttema === 'abe')
                                            <a href="" class="text-decoration-none approve">
                                                <button class="button button-success circular-button tooltip">
                                                    <span class="tooltiptext">Aprovar Tema</span>

                                                    <i class="fa fa-thumbs-up"></i>
                                                </button>
                                            </a>

                                            <a href="" class="text-decoration-none disapprove">
                                                <button class="button button-danger circular-button tooltip">
                                                    <span class="tooltiptext">Reprovar Tema</span>

                                                    <i class="fa fa-thumbs-down"></i>
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="5">Nenhum registro encontrado</td>
                            </tr>
                        @endif
                        <tr>
                            <td class="text-right" colspan="5">Visualizando <b>{{ $themes['filter'] }}</b> de <b>{{ $themes['count'] }}</b> temas</td>
                        </tr>
                    </tbody>
                </table>

                {{ (!empty($themes['data'])) ? $themes['data']->links() : '' }}
            </div>

            <div class="card-footer"></div>
        </div>
    </div>

    <div class="active-modal"></div>
@endsection

@section('scripts')
    @include('admin::theme.javascript.show')
@endsection