@extends('user::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Dashboard</li>
@endsection

@section('content')
    <div class="block p-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/100-launch.png') }}" width="80px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Eventos - Participações Confirmadas</h2>
        </div>
    </div>

    <div class="block p-md">
        <div class="card">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Eventos com Presença Confirmada

                    <i class="fa fa-calendar-alt right" style="margin-top:2px;"></i>
                </h3>
            </div>
            <div class="card-body p-md m-b-md">
                <table>
                    <thead class="background-strong-blue white">
                        <tr>
                            <th class="p-md">Evento</th>
                            <th class="p-md">Curso</th>
                            <th class="p-md">Data</th>
                            <th class="p-md">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>Gametech</td>g
                            <td>Análise e Desenvolvimento de Sistemas</td>
                            <td>Amanhã</td>
                            <td>
                                <button class="button button-success circular-button">
                                    <i class="fa fa-thumbs-up"></i>
                                </button>

                                <button class="button button-danger circular-button" title="Cancelar Participação">
                                    <i class="fa fa-thumbs-down"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Gametech</td>
                            <td>Análise e Desenvolvimento de Sistemas</td>
                            <td>Semana que vem</td>
                            <td>
                                <button class="button button-success circular-button">
                                    <i class="fa fa-thumbs-up"></i>
                                </button>

                                <button class="button button-danger circular-button" title="Cancelar Participação">
                                    <i class="fa fa-thumbs-down"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Gametech</td>
                            <td>Análise e Desenvolvimento de Sistemas</td>
                            <td>Semana que vem</td>
                            <td>
                                <button class="button button-success circular-button">
                                    <i class="fa fa-thumbs-up"></i>
                                </button>

                                <button class="button button-danger circular-button" title="Cancelar Participação">
                                    <i class="fa fa-thumbs-down"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Gametech</td>
                            <td>Análise e Desenvolvimento de Sistemas</td>
                            <td>Mês que vem</td>
                            <td>
                                <button class="button button-success circular-button">
                                    <i class="fa fa-thumbs-up"></i>
                                </button>

                                <button class="button button-danger circular-button" title="Cancelar Participação">
                                    <i class="fa fa-thumbs-down"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="block p-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/040-code.png') }}" width="85px">
        </div>

        <div class="inline-block align-middle m-l-sm">
            <h2 class="m-t-sm">Dashboard - Informações atualizadas</h2>
        </div>
    </div>

    <div class="graphics text-center flex m-l-md">
        <div class="card text-left m-t-md" style="width:32%;">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Eventos Disponiveis

                    <i class="fa fa-book right" style="margin-top:4px;"></i>
                </h3>
            </div>
            <div class="card-body p-md">
                <div class="block text-center">
                    <figure>
                        <img src="{{ asset('img/seo-marketing/png/093-rate.png') }}" width="115px">
                        <figcaption class="m-t-md">
                            <b>Seu Perfil de Usuário</b>
                        </figcaption>
                    </figure>
                </div>

                <div class="block m-b-md">
                    <table>
                        <thead class="background-strong-blue white">
                            <tr>
                                <th>Participações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>4 eventos</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center white background-weak-blue">
                <p style="margin:0;">Atualizado Diariamente</p>
            </div>
        </div>

        <div class="card text-left m-t-md m-l-md" style="width:32%;">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Participação - Semana Passada

                    <i class="fa fa-chart-pie right" style="margin-top:4px;"></i>
                </h3>
            </div>
            <div class="card-body text-center p-md">
                <div class="block">
                    <input type="text" class="past-week" data-width="120" data-height="120" value="50" readonly>
                </div>

                <div class="block m-t-lg m-b-lg">
                    <table>
                        <thead class="background-strong-blue white">
                            <tr>
                                <th>Eventos Disponíveis</th>
                                <th>Participações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>14 eventos</td>
                                <td>7 eventos</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center white background-weak-blue" style="position:absolute;bottom:0;left:0;right:0">
                <p style="margin:0;">Atualizado Semanalmente</p>
            </div>
        </div>

        <div class="card text-left m-t-md m-l-md" style="width:32%;">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Participação - Mês Passado

                    <i class="fa fa-chart-area right" style="margin-top:4px;"></i>
                </h3>
            </div>
            <div class="card-body text-center p-md">
                <div class="block">
                    <input type="text" class="past-month" data-width="120" data-height="120" value="28" readonly>
                </div>

                <div class="block m-t-lg m-b-lg">
                    <table>
                        <thead class="background-strong-blue white">
                            <tr>
                                <th>Eventos Disponíveis</th>
                                <th>Participações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>42 eventos</td>
                                <td>12 eventos</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center white background-weak-blue" style="position:absolute;bottom:0;left:0;right:0">
                <p style="margin:0;">Atualizado Mensalmente</p>
            </div>
        </div>
    </div>
    <div class="block text-center m-l-md">
        <div class="card block text-left m-t-lg" style="width:98%;">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Participação - Semana Passada

                    <i class="fa fa-chart-pie right" style="margin-top:4px;"></i>
                </h3>
            </div>
            <div class="card-body p-md">
                <div id="event"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('user::dashboard.javascript.index')
@endsection