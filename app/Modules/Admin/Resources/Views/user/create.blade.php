@extends('admin::layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/steps.css') }}">
@endsection

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('admin.user') }}">Lista de Usuários</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Adicionar Usuário</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/089-target.png') }}" width="80px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Usuários - Adicionar Usuário</h2>

            <span class="block" style="margin-top:-3px;margin-left:4px;">
                Visualize aqui todas as informações referente aos <b>Usuários</b>.
            </span>
        </div>
    </div>

    <div class="p-md">
        <div class="card" style="width:100%;">
            <div class="card-header background-strong-blue white">
                <h3 class="m-t-sm m-b-sm">
                    Adicionar Usuário

                    <i class="fa fa-user-secret right" style="margin-top:2px;"></i>
                </h3>
            </div>
            <div class="card-body">
                <div class="steps text-left p-sm m-l-md m-r-md">
                    <form method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div data-function="step" style="padding-bottom:0">
                            <h3 class="m-t-sm header">Informações Pessoais</h3>

                            <div class="form-group">
                                <label for="nome" class="form-label required-field">Nome</label>
                                <input type="text" name="nome" class="form-input required" id="nome" placeholder="Nome" value="{{ old('nome') }}">
                            </div>

                            <div class="form-group m-t-md">
                                <label for="email" class="form-label required-field">E-mail</label>
                                <input type="email" name="email" class="form-input required" id="email" placeholder="E-mail" value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="flexterno" class="form-label required-field">Aluno externo?</label>
                                <select name="flexterno" class="form-input required external" id="flexterno">
                                    <option value="">Selecione uma opção</option>
                                    @foreach(App\Utilities\Arrays::conditional() as $key => $value)
                                        <option value="{{ $value }}" {{ ($value == old('flexterno')) ? 'selected' : '' }}>{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group m-t-md none course">
                                <label for="idcurso" class="form-label required-field">Curso</label>
                                <select name="idcurso" class="form-input" id="idcurso">
                                    <option value="">Selecione o curso</option>
                                    @foreach(App\Utilities\Arrays::courses() as $course)
                                        <option value="{{ $course['id'] }}" {{ old('idcurso') === $course['id'] ? 'selected' : '' }}>{{ $course['nome'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div data-function="step" style="padding-bottom:0">
                            <h3 class="m-t-md header">Papel/Status</h3>

                            <div class="form-group m-t-md">
                                <label for="stusuario" class="block form-label required-field">Status:</label>
                                <select name="stusuario" class="form-input" id="stusuario">
                                    <option value="">Selecione uma opção</option>
                                    <option value="ati" {{ old('stusuario') === 'ati' ? 'selected' : '' }}>Ativo</option>
                                    <option value="ina" {{ old('stusuario') === 'ina' ? 'selected' : '' }}>Inativo</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="idpapel" class="form-label required-field">Papel</label>
                                <select name="idpapel" class="form-input" id="idpapel">
                                    <option value="">Selecione um Papel</option>
                                    @foreach(\App\Utilities\Arrays::papers() as $paper)
                                        <option value="{{ $paper['id'] }}">{{ $paper['nome'] }}</option>
                                    @endforeach
                                </select>
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

    @include('admin::user.javascript.create')
@endsection