@extends('layouts.app')

@section('content')
    <h2 class="header m-t-sm m-b-sm">
        <b>Quem somos nós?</b>
    </h2>

    <div class="block p-md">
        <div class="inline-block align-middle" style="width:10%">
            <img src="{{ asset('img/gilberto-resende.jpg') }}" width="100%">
        </div>
        <div class="inline-block text-justify align-middle m-l-sm" style="width:85%;">
            <div class="block">
                <h2><b>Gilberto Giro Resende:</b></h2>

                Estudande da Faculdade de Tecnologia de Jundiaí, é um iniciante no ramo da programação em busca de novas oportunidades de crescimento, tanto profissional, quanto
                pessoal. Foi o responsável pelo desenvolvimento da aplicação web, tanto no front-end, quanto no back-end. Seu principal objetivo foi o de criar uma aplicação intuitiva e interativa para suprir
                uma necessidade encontrada em sua faculdade.
            </div>

            <div class="block text-right m-t-md">
                <a href="" class="no-decoration">
                    <i class="fab fa-google-plus-square medium red"></i>
                </a>

                <a href="https://www.linkedin.com/in/gilberto-r-992456120?trk=nav_responsive_tab_profile_pic" target="_blank" class="no-decoration">
                    <i class="fab fa-linkedin facebook-blue medium"></i>
                </a>

                <a href="https://www.facebook.com/gilberto.giro" target="_blank" class="no-decoration">
                    <i class="fab fa-facebook-square medium facebook-blue"></i>
                </a>
            </div>
        </div>
    </div>
@endsection