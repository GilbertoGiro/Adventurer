@extends('layouts.app')

@section('content')
    <h2 class="header m-t-sm">Qual a programação desse mês?</h2>

    <div class="block text-center m-t-md m-b-md">
        <div class="card inline-block background-warning m-r-md m-b-lg m-t-md" style="width:30%;min-height:220px;">
            <div class="card-body text-left p-md">
                <h3 class="m-t-sm">Qual cor representa meu curso?</h3>

                <div class="block m-t-sm p-sm">
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

        <div class="card inline-block background-warning m-r-md m-b-lg m-t-md" style="width:35%;min-height:220px;">
            <div class="card-body text-left p-md">
                <h3 class="m-t-sm">Como saber se ainda há vagas disponíveis?</h3>

                <div class="block text-justify m-t-sm p-sm">
                    Ao clicar no evento desejado, um modal será aberto disponibilizando uma série de informações
                    referente ao mesmo. Dentro do modal, será possível visualizar uma linha nomeada <b>Status</b>,
                    a informação requisitada. Caso haja um <span class="small-circle background-green"></span>, o
                    evento possui vagas. Caso haja um <span class="small-circle background-gold"></span>, o evento
                    possui vagas porém que estão acabando. Caso haja um <span class="small-circle background-red"></span>,
                    o evento não possui mais vagas
                </div>
            </div>
        </div>

        <div class="card inline-block background-warning m-b-lg m-t-md" style="width:30%;min-height:220px;">
            <div class="card-body text-left p-md">
                <h3 class="m-t-sm">Como saber se o evento é privado?</h3>

                <div class="block text-justify m-t-sm p-sm">
                    Para verificar essa informação, basta parar o mouse sobre algum dos eventos disponibilizados abaixo e um tooltip (caixa informacional)
                    aparecerá com a mesma em seu conteúdo.
                </div>
            </div>
        </div>
    </div>

    <div class="block">
        <div id="events-calendar"></div>
    </div>

    <div class="active-modal"></div>
@endsection

@section('scripts')
    @include('javascript.event')
@endsection