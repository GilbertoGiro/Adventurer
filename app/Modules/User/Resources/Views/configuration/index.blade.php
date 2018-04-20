@extends('user::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Configurações</li>
@endsection

@section('content')
    <div class="block p-md">
        <div class="inline-block align-middle m-r-md">
            <img src="{{ asset('img/seo-marketing/png/012-folder-3.png') }}" width="75px">
        </div>
        <div class="inline-block align-middle">
            <h2 class="m-t-sm">Configurações - Recebimento de E-mail e Notificações</h2>
        </div>
    </div>

    <div class="block p-md">
        <div class="card" style="width:100%">
            <div class="card-header milk background-strong-blue">
                <h3 class="m-t-sm">
                    Configurações Disponíveis

                    <i class="fa fa-cog fa-spin right" style="margin-top:4px;"></i>
                </h3>
            </div>
            <div class="card-body p-md">
                <h3 class="m-t-sm header">E-mail - Diário, Semanal, Mensal:</h3>

                <div class="p-sm">
                    <div class="block">
                        <input type="checkbox" name="flemail" value="s" id="notifyEmail">
                        <label for="notifyEmail" class="form-label">Deseja ser notificado por <b>e-mail</b>?</label>
                    </div>

                    <div class="block m-t-md">
                        <input type="checkbox" name="calendia" value="s" id="dailyCalendar">
                        <label for="dailyCalendar" class="form-label">Deseja receber um <b>Calendário Diário</b>?</label>
                    </div>

                    <div class="block m-t-md">
                        <input type="checkbox" name="calensem" value="s" id="weekCalendar">
                        <label for="weekCalendar" class="form-label">Deseja receber e-mails com o <b>Calendário Semanal</b>?</label>
                    </div>

                    <div class="block m-t-md">
                        <input type="checkbox" name="calenmes" value="s" id="monthlyCalendar">
                        <label for="monthlyCalendar" class="form-label">Deseja receber e-mails com um <b>Relatório da Atividade Mensal</b>?</label>
                    </div>
                </div>

                <h3 class="m-t-md header">Notificações - Momentos e Circunstâncias:</h3>

                <div class="p-sm">
                    <div class="block">
                        <input type="checkbox" name="flcurso" value="s" id="newCourses">
                        <label for="newCourses" class="form-label">Deseja ser notificado de novos <b>Eventos</b> (Seu Curso)?</label>
                    </div>

                    <div class="block m-t-md">
                        <input type="checkbox" name="calendia" value="s" id="dailyCalendar">
                        <label for="dailyCalendar" class="form-label">Não desejo ser <b>notificado</b></label>
                    </div>
                </div>

                <div class="p-sm m-t-md text-right">
                    <button class="button button-success">Salvar Configurações <i class="fa fa-save"></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection