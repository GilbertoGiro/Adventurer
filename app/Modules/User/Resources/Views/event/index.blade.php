@extends('user::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Dashboard</li>
@endsection

@section('content')
    <div class="block p-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/040-code.png') }}" width="85px">
        </div>

        <div class="inline-block align-middle m-l-sm">
            <h2 class="m-t-sm">Dashboard - Informações atualizadas</h2>
        </div>
    </div>

    <div class="graphics text-center block m-l-md">
        <div class="card text-left m-t-md" style="width:30%;">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Eventos Disponiveis

                    <i class="fa fa-book right" style="margin-top:4px;"></i>
                </h3>
            </div>
            <div class="card-body p-md">
            </div>
        </div>

        <div class="card text-left m-t-md m-l-md" style="width:30%;">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Participação - Semana Passada

                    <i class="fa fa-chart-pie right" style="margin-top:4px;"></i>
                </h3>
            </div>
            <div class="card-body text-center p-md">
                <div class="block">
                    <input type="text" class="past-week" data-width="125" data-height="125" value="56" readonly>
                </div>

                <div class="block m-t-lg m-b-lg">
                    <table>
                        <thead class="background-strong-blue white">
                            <tr>
                                <th>Eventos Disponíveis</th>
                                <th>Participações</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center white background-weak-blue">
                <p style="margin:0;">Atualizado Semanalmente</p>
            </div>
        </div>

        <div class="card text-left m-t-md m-l-md" style="width:30%;">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Participação - Mês Passado

                    <i class="fa fa-chart-area right" style="margin-top:4px;"></i>
                </h3>
            </div>
            <div class="card-body p-md">

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('user::event.javascript.index')
@endsection