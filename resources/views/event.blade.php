@extends('layouts.app')

@section('content')
    <h2 class="header m-t-sm">Qual a programação desse mês?</h2>

    <div class="block text-center">
        <div class="card inline-block background-warning m-r-md m-b-lg m-t-md" style="width:35%;height:215px;">
            <div class="card-body text-left p-md">
                <h3 class="m-t-sm">Qual cor representa meu curso?</h3>

                <div class="block m-t-md p-sm">
                    <div class="block dots">
                        <span class="small-circle background-strong-blue m-r-sm"></span> Análise e Desenvolvimento de Sistemas
                    </div>

                    <div class="block dots m-t-sm">
                        <span class="small-circle background-weak-blue m-r-sm"></span> Gestão de Tecnologia da Informação
                    </div>

                    <div class="block dots m-t-sm">
                        <span class="small-circle background-gold m-r-sm"></span> Eventos
                    </div>

                    <div class="block dots m-t-sm">
                        <span class="small-circle background-green m-r-sm"></span> Gestão Ambiental
                    </div>

                    <div class="block dots m-t-sm">
                        <span class="small-circle background-red m-r-sm"></span> Administração
                    </div>
                </div>
            </div>
        </div>

        <div class="card inline-block background-warning m-r-md m-b-lg m-t-md" style="width:35%;height:215px;">
            <div class="card-body text-left p-md">
                <h3 class="m-t-sm">Como saber se ainda há vagas disponíveis?</h3>

                <div class="block text-justify m-t-md p-sm">
                    Ao clicar no evento desejado, um modal será aberto disponibilizando uma série de informações
                    referente ao mesmo. Dentro do modal, será possível visualizar uma linha nomeada <b>Status</b>,
                    a informação requisitada. Caso haja um <span class="small-circle background-green"></span>, o
                    evento possui vagas. Caso haja um <span class="small-circle background-gold"></span>, o evento
                    possui vagas porém que estão acabando. Caso haja um <span class="small-circle background-red"></span>,
                    o evento não possui mais vagas
                </div>
            </div>
        </div>
    </div>

    <div class="block">
        <div id="events-calendar"></div>
    </div>
@endsection

@section('scripts')
    @include('javascript.event')
@endsection