@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('admin.suggest') }}">Sugestão de Temas</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Adicionar Sugestão de Tema</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/tasks/png/022-whiteboard.png') }}" width="75px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Temas - Adicionar Sugestão de Tema</h2>
            <span class="block" style="margin-top:-3px;margin-left:4px;">
                Visualize aqui todas as informações referente as suas <b>Sugestões de Tema</b>.
            </span>
        </div>
    </div>

    <div class="block p-md m-t-sm">
        <div class="card" style="width:100%;">
            <div class="card-header background-strong-blue white">
                <h3 class="m-t-sm">
                    Formulário de Inscrição - Novos Temas

                    <i class="fa fa-book right" style="margin-top:2px;"></i>
                </h3>
            </div>

            <div class="card-body p-md" style="padding:6px 12px 6px 12px;">
                <div class="p-sm">
                    <form method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="tema" class="form-label required-field">Nome do Tema</label>
                            <input name="titulo" type="text" class="form-input" id="tema" placeholder="Nome do Tema" value="{{ old('titulo') }}">
                        </div>

                        <div class="form-group">
                            <label for="idcurso" class="form-label required-field">Curso</label>
                            <select name="idcurso" class="form-input" id="idcurso">
                                <option value="">Selecione o Curso</option>
                                @foreach(\App\Utilities\Arrays::courses() as $course)
                                    <option value="{{ $course['id'] }}" {{ (old('idcurso') == $course['id']) ? 'selected' : '' }}>{{ $course['nome'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group m-t-md">
                            <label for="descricao" class="form-label required-field">Descrição do Tema</label>
                            <textarea name="descricao" class="form-text-area summernote" id="descricao" placeholder="Descrição do Tema">{{ old('descricao') }}</textarea>
                        </div>

                        <div class="form-group m-t-md">
                            <label for="photo" class="form-label">Imagem do Tema</label>
                            <input type="file" name="photo" class="block" style="margin-top:8px">
                        </div>

                        <div class="form-group text-right m-t-md">
                            <button class="button button-success">Cadastrar Tema <i class="fa fa-paper-plane"></i></button>
                        </div>

                        <input type="hidden" name="email" value="{{ $admin->email }}">
                        <input type="hidden" name="nmusuario" value="{{ $admin->nome }}">
                        <input type="hidden" name="sttema" value="apr">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin::theme.javascript.create')
@endsection