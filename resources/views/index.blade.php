@extends('layouts.app')

@section('content')
    <div class="block m-b-lg">
        <div class="inline-block align-middle m-r-md">
            <img src="{{ asset('img/event/png/044-restaurant-menu.png') }}" width="80px" alt="">
        </div>
        <div class="inline-block align-middle">
            <h2 class="roboto">Principais Eventos em Andamento</h2>
            <span class="block">Encontre aqui todos os eventos que encontram-se como <span class="green"><b>disponíveis</b></span> de maneira simples e prática.</span>
        </div>
    </div>

    <div class="block m-b-lg text-center most-important-events-list">
        <div class="event-box shadow inline-block align-top">
            <div class="event-box-header white">
                <span class="dots"><b>Semana de Tecnologia</b></span>
            </div>
            <div class="event-box-body">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/026-conference.png') }}" width="70px">
                </div>
            </div>
        </div>
        <div class="event-box shadow inline-block align-top">
            <div class="event-box-header white">
                <span class="dots"><b>Gametech</b></span>
            </div>
            <div class="event-box-body">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/026-conference.png') }}" width="70px">
                </div>
            </div>
        </div>
        <div class="event-box shadow inline-block align-top">
            <div class="event-box-header white">
                <span class="dots"><b>Grupo de Arduíno</b></span>
            </div>
            <div class="event-box-body">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/026-conference.png') }}" width="70px">
                </div>
            </div>
        </div>
        <div class="event-box shadow inline-block align-top">
            <div class="event-box-header white">
                <span class="dots"><b>Aprendendo Python</b></span>
            </div>
            <div class="event-box-body">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/026-conference.png') }}" width="70px">
                </div>
            </div>
        </div>
    </div>

    <div class="block m-b-lg">
        <div class="inline-block align-middle m-r-md">
            <img src="{{ asset('img/event/png/043-pass.png') }}" width="85px" alt="">
        </div>
        <div class="inline-block align-middle">
            <h2 class="roboto">Eventos Disponíveis nessa Semana</h2>
            <span class="block">Encontre aqui todos os eventos que encontram-se como <span class="green"><b>disponíveis</b></span> de maneira simples e prática.</span>
        </div>
    </div>
    <div class="events-calendar-configuration align-top">
        <div id="events-calendar"></div>
    </div>
    <div class="event-information inline-block align-top">
        <h3 class="roboto header">Semana de Tecnologia - Faculdade de Tecnologia de Jundiaí</h3>

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

        <div class="block action-buttons m-t-md text-right">
            <button type="button" class="button black left" style="margin-top:4px;">Participar <i class="fa fa-user-plus black"></i></button>
            <button type="button" class="button button-danger">Não Gostei <i class="fa fa-thumbs-down white"></i></button>
            <button type="button" class="button button-success m-l-sm">Gostei <i class="fa fa-thumbs-up white"></i></button>
        </div>
    </div>
@endsection

@section('scripts')
    @include('javascript.index')
@endsection