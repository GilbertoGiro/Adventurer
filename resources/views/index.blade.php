@extends('layouts.app')

@section('content')
    <div class="block m-b-lg">
        <div class="inline-block align-middle m-r-md">
            <img src="{{ asset('img/event/png/044-restaurant-menu.png') }}" width="80px" alt="">
        </div>
        <div class="inline-block align-middle">
            <h2 class="roboto">Principais Eventos em Andamento</h2>
            <span class="block">Encontre aqui todos os eventos que encontram-se como <span
                        class="green"><b>disponíveis</b></span> de maneira simples e prática.</span>
        </div>
    </div>

    @if(count($events))
        @foreach($events as $event)
            <div class="block m-b-lg text-center most-important-events-list">
                <div class="event-box shadow inline-block align-top">
                    <div class="event-box-header white">
                        <span class="dots"><b>{{ $event->theme->titulo }}</b></span>
                    </div>
                    <div class="event-box-body">
                        <div class="small-circular-image">
                            <img src="{{ asset('img/event/png/026-conference.png') }}" width="70px">
                        </div>
                        <div class="block m-t-md">
                            <span class="block dots margin-center m-b-md" style="max-width:80%;">
                                <b>Palestrante:</b> {{ $event->palestrante }}
                            </span>

                            <span class="block dots margin-center m-b-md" style="max-width:80%;">
                                <b>Situação:</b> <span class="green"><b>{!! \App\Utilities\Arrays::eventStatusText($event->stevento) !!}</b></span>
                            </span>

                            <span class="block dots margin-center m-b-md" style="max-width:80%;">
                                <b>Participantes:</b> {{ $event->limite }} pessoas
                            </span>

                            <span class="block dots margin-center m-b-md" style="max-width:80%;">
                                <b>Duração:</b> {{ $event->duracao }} horas
                            </span>

                            <span class="block margin-center m-b-md">
                                <a href="" class="facebook-blue">Mais informações <i class="fa fa-info-circle"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center m-t-lg m-b-lg background-weak-blue white p-md" style="border-radius:4px;">
            Nenhum evento encontrado na base de dados.
        </div>
    @endif

    <div class="block m-b-lg">
        <div class="inline-block align-middle m-r-md">
            <img src="{{ asset('img/event/png/043-pass.png') }}" width="85px" alt="">
        </div>
        <div class="inline-block align-middle">
            <h2 class="roboto">Eventos Disponíveis nessa Semana</h2>
            <span class="block">Encontre aqui todos os eventos que encontram-se como <span
                        class="green"><b>disponíveis</b></span> de maneira simples e prática.</span>
        </div>
    </div>
    <div class="events-calendar-configuration align-top">
        <div id="events-calendar"></div>
    </div>
    <div class="event-information inline-block align-top">
        <h2 class="roboto dots">Semana de Tecnologia - Faculdade de Tecnologia de Jundiaí Faculdade de Tecnologia de
            Jundiaí Faculdade de Tecnologia de Jundiaí</h2>

        <div class="block p-sm text-justify">
            <span class="block">
                <b>Descrição:</b> A Fatec Jundiaí promove nos dias 04, 05 e 06 de Setembro de 2017 a sua tradicional Semana de Tecnologia, oferecendo uma grande variedade de atividades envolvendo profissionais da área, alunos e professores dos cursos de Logística, Eventos, Gestão Ambiental,
                Análise e Desenvolvimento de Sistemas, Gestão da Tecnologia da Informação e Gestão Empresarial.
            </span>
            <span class="block m-t-md">
                <b>Situação Atual:</b> <span class="red"><b>Esgotado</b></span>
            </span>
            <span class="block m-t-md">
                <b>Mídias Disponíveis:</b> Nenhuma mídia enviada.
            </span>
        </div>

        <div class="p-sm">
            <h2 class="roboto dots" style="margin-left:-8px">Tem interesse em Participar do Evento?</h2>

            <form class="event-inscription m-t-md">
                <div class="form-group m-t-md">
                    <label for="email">Qual o seu e-mail?</label>
                    <input type="email" name="email" class="form-input" id="email" placeholder="exemplo@exemplo.com.br">
                </div>

                <div class="form-group m-t-md">
                    <label for="nome">Qual seu nome?</label>
                    <input type="text" name="nome" class="form-input" id="nome" placeholder="Exemplo">
                </div>

                <div class="form-group m-t-md">
                    <label for="flaluno">É um aluno da Faculdade?</label>
                    <select name="flaluno" class="form-input" id="flaluno">
                        <option value="">Selecione uma opção</option>
                        <option value="s">Sim</option>
                        <option value="n">Não</option>
                    </select>
                </div>

                <div class="form-group m-t-md">
                    <button type="submit" class="button button-success form-input">Submeter Inscrição <i
                                class="fa fa-graduation-cap"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @include('javascript.index')
@endsection