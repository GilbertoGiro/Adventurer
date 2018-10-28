@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Lista de Eventos</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/091-mobile-web-1.png') }}" width="75px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Eventos - Gerenciar Informações</h2>
            <span class="block" style="margin-top:-3px;margin-left:4px;">
                Visualize aqui todas as informações referente aos <b>Eventos</b> disponíveis na aplicação
            </span>
        </div>
    </div>

    <div class="p-md" style="margin-top:-20px;">
        <div class="block text-center">
            <form class="table-fixed">
                <div class="form-group text-left table-cell p-sm">
                    <label for="idtema" class="form-label bold">Tema</label>
                    <select name="idtema" class="form-input" id="idtema">
                        <option value="">Selecione uma opção</option>

                        @foreach(\App\Utilities\Arrays::themes() as $theme)
                            <option value="{{ $theme['id'] }}" {{ (request('idtema') === $theme['id']) ? 'selected' : '' }}>{{ $theme['titulo'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label for="palestrante" class="form-label bold">Palestrante</label>
                    <input type="text" name="palestrante" class="form-input" id="palestrante" placeholder="Palestrante">
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label for="idcurso" class="form-label bold">Curso</label>
                    <select name="idcurso" class="form-input" id="idcurso">
                        <option value="">Selecione uma opção</option>

                        @foreach(\App\Utilities\Arrays::courses() as $course)
                            <option value="{{ $course['id'] }}" {{ (request('idcurso') === $course['id']) ? 'selected' : '' }}>{{ $course['nome'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label class="form-label bold">Buscar</label>
                    <button type="submit" class="button button-success form-input">Buscar <i class="fa fa-search"></i></button>
                </div>

                <div class="form-group text-left table-cell p-sm">
                    <label class="form-label bold">Adicionar</label>
                    <a href="{{ route('admin.event.create') }}">
                        <button type="button" class="button background-strong-blue white form-input">Novo Evento <i class="fa fa-calendar-plus"></i></button>
                    </a>
                </div>
            </form>
        </div>

        <div class="card block m-t-sm">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm bold">
                    Lista de Eventos

                    <i class="fa fa-handshake right" style="margin-top:3px"></i>
                </h3>
            </div>

            <div class="card-body p-md">
                <table>
                    <thead class="background-strong-blue white">
                        <tr>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Tema', 'idtema') !!}</th>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Palestrante', 'palestrante') !!}</th>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Data Prevista', 'dtprevista') !!}</th>
                            <th>{!! \App\Utilities\Tables::makeOrderedColumn('Duração', 'duracao') !!}</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($events['data']))
                            @foreach($events['data'] as $event)
                                <tr class="text-center">
                                    <td>{{ $event->theme->titulo }}</td>
                                    <td>{{ $event->palestrante }}</td>
                                    <td>{{ (new \Carbon\Carbon($event->dtprevista))->format('d/m/Y') }}</td>
                                    <td>{{ $event->duracao }}</td>
                                    <td>
                                        <a href="" class="text-decoration-none">
                                            <button class="button button-info circular-button tooltip">
                                                <span class="tooltiptext">Visualizar Evento</span>

                                                <i class="fa fa-book"></i>
                                            </button>
                                        </a>

                                        <a href="" class="text-decoration-none">
                                            <button class="button button-warning circular-button tooltip">
                                                <span class="tooltiptext">Editar Evento</span>

                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        <a href="" class="text-decoration-none">
                                            <button class="button button-danger circular-button tooltip">
                                                <span class="tooltiptext">Notificar Participantes</span>

                                                <i class="fa fa-phone"></i>
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
                            <td class="text-right" colspan="5">Visualizando <b>{{ $events['filter'] }}</b> de <b>{{ $events['count'] }}</b> eventos</td>
                        </tr>
                    </tbody>
                </table>

                {{ (!empty($events['data'])) ? $events['data']->links() : '' }}
            </div>

            <div class="card-footer"></div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection