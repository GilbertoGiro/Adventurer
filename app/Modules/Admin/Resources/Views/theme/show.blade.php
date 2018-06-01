@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('admin.suggest') }}">Lista de Temas</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">{{ $theme->titulo }}</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/tasks/png/018-clipboard-1.png') }}" width="80px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm m-b-sm">Informações - {{ $theme->titulo }}</h2>
            <p class="block m-b-sm" style="margin-top:-2px;">Visualize aqui todas as informações do <b>Tema</b>.</p>
        </div>
    </div>

    <div class="p-md">
        <div class="block card m-t-sm" style="width:100%;">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Informações Completas

                    <i class="fa fa-book right" style="margin-top:3px;"></i>
                </h3>
            </div>

            <div class="card-body p-md">
                <div class="block p-md">
                    <div class="m-b-md text-center">
                        @if(empty($theme->photo))
                            <img src="{{ asset('img/No-Image.png') }}" width="215px">
                        @else
                            <img src="{{ asset($theme->photo) }}" width="215px">
                        @endif
                    </div>

                    <span class="block m-t-md">
                        <label class="form-label bold">Sugerida por:</label> <a href="{{ route('admin.user.show', $theme->idusuario) }}" class="facebook-blue">{{ $theme->nmusuario }}</a>
                    </span>

                    <span class="block m-t-md">
                        <label class="form-label bold">Curso:</label> {{ $theme->course->nome }}
                    </span>

                    <span class="block m-t-md">
                        <label class="form-label bold">Status:</label> {!! \App\Utilities\Arrays::themeStatusLabel($theme->sttema) !!}
                    </span>

                    <span class="block m-t-md text-justify">
                        <label class="form-label bold">Descrição:</label> {!! $theme->descricao !!}
                    </span>

                    <span class="block m-t-md">
                        <label class="form-label bold">Enviada em:</label> {{ (new \Carbon\Carbon($theme->created_at))->format('d/m/Y H:i:s') }}
                    </span>

                    <span class="block text-right m-t-lg">
                        <button class="button button-warning tooltip m-r-sm">
                            <span class="tooltiptext">Notificar Usuário</span>

                            Notificar Usuário <i class="fa fa-envelope"></i>
                        </button>

                        <button class="button button-danger tooltip m-r-sm">
                            <span class="tooltiptext">Reprovar Tema</span>

                            Reprovar <i class="fa fa-thumbs-down"></i>
                        </button>

                        <button class="button button-success tooltip">
                            <span class="tooltiptext">Aprovar Tema</span>

                            Aprovar <i class="fa fa-thumbs-up"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection