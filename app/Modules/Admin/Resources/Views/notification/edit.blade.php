@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('admin.notification') }}">Notificações</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">{{ $notify->titulo }}</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/tasks/png/026-smartphone-1.png') }}" width="80px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Notificações - Editar Notificação</h2>

            <span class="block" style="margin-top:-3px;margin-left:4px;">
                Visualize aqui todas as informações referente à <b>Notificação</b>.
            </span>
        </div>
    </div>

    <div class="p-md">
        <div class="card" style="width:100%;">
            <div class="card-header background-strong-blue white">
                <h3 class="m-t-sm m-b-sm">
                    Editar Notificação

                    <i class="fa fa-envelope right" style="margin-top:2px;"></i>
                </h3>
            </div>
            <div class="card-body">
                <div class="text-left p-sm m-l-md m-r-md">
                    <form method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="titulo" class="form-label required-field">Título</label>
                            <input type="text" name="titulo" class="form-input required" id="titulo" placeholder="Título" value="{{ old('titulo', $notify->titulo) }}">
                        </div>

                        <div class="form-group">
                            <label for="stnotificacao" class="form-label required-field">Status</label>
                            <select name="stnotificacao" class="form-input required" id="stnotificacao">
                                <option value="">Selecione uma opção</option>
                                @foreach(App\Utilities\Arrays::status() as $key => $value)
                                    <option value="{{ $key }}" {{ ($key == old('stnotificacao', $notify->stnotificacao)) ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group m-t-md">
                            <label for="corpo" class="form-label required-field">Corpo</label>
                            <textarea name="corpo" class="summernote" id="corpo">{{ old('corpo', $notify->corpo) }}</textarea>
                        </div>

                        <div class="form-group text-right m-t-lg">
                            <button class="button button-success">
                                Salvar Notificação <i class="fa fa-save"></i>
                            </button>
                        </div>

                        <input type="hidden" name="idusuario" value="{{ Auth::guard('admin')->user()->id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin::notification.javascript.create')
@endsection