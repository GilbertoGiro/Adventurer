@extends('admin::layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/steps.css') }}">
@endsection

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('admin.event') }}">Lista de Eventos</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Adicionar Evento</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/091-mobile-web-1.png') }}" width="85px">
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
                        {{ csrf_field() }}

                        <div data-function="step" style="padding-bottom:0">
                            <h3 class="m-t-sm header">Informações Evento</h3>

                            <div class="form-group m-t-md">
                                <label for="idtema" class="form-label required-field">Tema</label>
                                <select name="idtema" class="form-input required" id="idtema">
                                    <option value="">Selecione o tema</option>
                                    @foreach(App\Utilities\Arrays::themes() as $theme)
                                        <option value="{{ $theme['id'] }}" {{ old('idtema') === $theme['id'] ? 'selected' : '' }}>{{ $theme['titulo'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group m-t-md">
                                <label for="dtprevista" class="form-label required-field">Data Prevista</label>
                                <input type="date" name="dtprevista" min="{{ date('Y-m-d') }}" class="form-input required" id="dtprevista">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="hrinicio" class="form-label required-field">Hora de Início</label>
                                <input type="text" name="hrinicio" class="form-input required hour" id="hrinicio" placeholder="00:00">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="duracao" class="form-label required-field">Duração</label>
                                <input type="text" name="duracao" class="form-input required hour" id="duracao" placeholder="00:00">
                            </div>
                        </div>

                        <div data-function="step" style="padding-bottom:0">
                            <h3 class="m-t-md header">Localização</h3>

                            <div class="form-group m-t-md">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input name="endereco" type="text" class="form-input" id="endereco" placeholder="Endereço" value="{{ old('endereco') }}">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="numero" class="form-label">Número</label>
                                <input name="numero" type="number" class="form-input" id="numero" placeholder="Número" value="{{ old('numero') }}">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input name="bairro" type="text" class="form-input" id="bairro" placeholder="Bairro" value="{{ old('bairro') }}">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="complemento" class="form-label">Complemento</label>
                                <input name="complemento" type="text" class="form-input" id="complemento" placeholder="Complemento" value="{{ old('complemento') }}">
                            </div>
                        </div>

                        <div data-function="step" style="padding-bottom:0">
                            <h3 class="m-t-md header">Informação Adicional</h3>

                            <div class="form-group m-t-md">
                                <label for="limite" class="form-label required-field">Limite de Participantes</label>
                                <input name="limite" type="number" class="form-input required" id="limite" placeholder="Limite de Participantes" value="{{ old('limite') }}">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="palestrante" class="form-label required-field">Palestrante</label>
                                <input name="palestrante" type="text" class="form-input required" id="palestrante" placeholder="Palestrante" value="{{ old('palestrante') }}">
                            </div>

                            <div class="form-group m-t-md">
                                <input name="flaberto" type="checkbox" class="required" id="flaberto" value="s" {{ (!empty(old('flaberto'))) ? 'checked' : '' }}>
                                <label for="flaberto" class="form-label required-field">Aberto a todos?</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/steps.js') }}"></script>
    @include('admin::event.javascript.create')
@endsection