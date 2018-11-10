@extends('admin::layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/steps.css') }}">
    <link href="{{ asset('select2/dist/css/select2.css') }}" rel="stylesheet"/>
@endsection

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('admin.event') }}">Lista de Eventos</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">{{ $episode->theme->titulo }}</li>
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

    <div class="p-md" style="margin-top:-4px;">
        <div class="card" style="width:100%;">
            <div class="card-header background-strong-blue white">
                <h3 class="m-t-sm">
                    Formulário de Inscrição - Novos Eventos

                    <i class="fa fa-book right" style="margin-top:2px;"></i>
                </h3>
            </div>

            <div class="card-body p-md" style="padding:6px 12px 6px 12px;">
                <div class="steps p-sm" data-href="">
                    <form method="post" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div data-function="step" style="padding-bottom:0">
                            <h3 class="m-t-sm header">Informações Evento</h3>

                            <div class="form-group m-t-md">
                                <label for="dtprevista" class="form-label required-field">Data Prevista</label>
                                <input type="date" name="dtprevista" min="{{ date('Y-m-d') }}" class="form-input required" id="dtprevista" value="{{ old('dtprevista', $episode->dtprevista) }}">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="hrinicio" class="form-label required-field">Hora de Início</label>
                                <input type="text" name="hrinicio" class="form-input required hour" id="hrinicio" placeholder="00:00" value="{{ old('hrinicio', $episode->hrinicio) }}">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="duracao" class="form-label required-field">Duração</label>
                                <input type="text" name="duracao" class="form-input required hour" id="duracao" placeholder="00:00" value="{{ old('duracao', $episode->duracao) }}">
                            </div>
                        </div>

                        <div data-function="step" style="padding-bottom:0">
                            <h3 class="m-t-md header">Localização</h3>

                            <div class="form-group m-t-md">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input name="endereco" type="text" class="form-input" id="endereco" placeholder="Endereço" value="{{ old('endereco', $episode->endereco) }}">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="numero" class="form-label">Número</label>
                                <input name="numero" type="number" class="form-input" id="numero" placeholder="Número" value="{{ old('numero', $episode->numero) }}">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input name="bairro" type="text" class="form-input" id="bairro" placeholder="Bairro" value="{{ old('bairro', $episode->bairro) }}">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="complemento" class="form-label">Complemento</label>
                                <input name="complemento" type="text" class="form-input" id="complemento" placeholder="Complemento" value="{{ old('complemento', $episode->complemento) }}">
                            </div>
                        </div>

                        <div data-function="step" style="padding-bottom:0">
                            <h3 class="m-t-md header">Informação Adicional</h3>

                            <div class="form-group m-t-md">
                                <label for="limite" class="form-label required-field">Limite de Participantes</label>
                                <input name="limite" type="number" class="form-input required" id="limite" placeholder="Limite de Participantes" value="{{ old('limite', $episode->limite) }}">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="palestrante" class="form-label required-field">Palestrante</label>
                                <input name="palestrante" type="text" class="form-input required" id="palestrante" placeholder="Palestrante" value="{{ old('palestrante', $episode->palestrante) }}">
                            </div>

                            <div class="form-group m-t-sm">
                                <input name="flaberto" type="checkbox" class="required" id="flaberto" value="s" {{ (!empty(old('flaberto', $episode->flaberto))) ? 'checked' : '' }}>
                                <label for="flaberto" class="form-label required-field inline-block">Aberto a todos?</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('select2/dist/js/select2.js') }}"></script>
    <script src="{{ asset('js/steps.js') }}"></script>
    @include('admin::event.javascript.create')
@endsection