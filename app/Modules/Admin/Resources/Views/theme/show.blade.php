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

    <div class="p-md" style="margin-top:-5px;">
        <div class="block card m-t-sm">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Informações Completas

                    <i class="fa fa-book right" style="margin-top:3px;"></i>
                </h3>
            </div>

            <div class="card-body p-md">
                <div class="flex" style="justify-content:inherit;">
                    <div class="align-top m-r-lg m-l-md">
                        @if(empty($theme->photo))
                            <img src="{{ asset('img/no-image.png') }}" class="m-t-sm">
                        @else
                            <img src="{{ asset($theme->photo) }}" class="m-t-sm">
                        @endif
                    </div>
                    <div class="align-top m-t-md">
                        <div class="block m-b-md">
                            <span class="bold">Sugerida por:</span>
                            <a href="{{ route('admin.user.show', $theme->idusuario) }}" class="facebook-blue">{{ $theme->nmusuario }}</a>
                        </div>
                        <div class="block m-b-md">
                            <span class="bold">Status:</span>
                            {!! \App\Utilities\Arrays::themeStatusLabel($theme->sttema) !!}
                        </div>
                        <div class="block m-b-md">
                            <span class="bold">Enviada em:</span> {{ (new \Carbon\Carbon($theme->created_at))->format('d/m/Y H:i:s') }}
                        </div>
                        <div class="block text-justify">
                            <span class="block bold m-b-sm">Descrição:</span>
                            {!! $theme->descricao !!}
                        </div>
                    </div>
                </div>

                <div class="block text-right m-t-lg">
                    <button class="button button-warning tooltip m-r-sm">
                        <span class="tooltiptext">Notificar Usuário</span>

                        Notificar Usuário <i class="fa fa-envelope"></i>
                    </button>

                    <button class="button button-danger tooltip m-r-sm disapprove {{ $theme->sttema !== 'abe' ? 'disabled-button' : '' }}" {{ $theme->sttema !== 'abe' ? 'disabled' : '' }} data-id="{{ $theme->id }}">
                        <span class="tooltiptext">Reprovar Tema</span>

                        Reprovar <i class="fa fa-thumbs-down"></i>
                    </button>

                    <button class="button button-success tooltip approve {{ $theme->sttema !== 'abe' ? 'disabled-button' : '' }}" {{ $theme->sttema !== 'abe' ? 'disabled' : '' }} data-id="{{ $theme->id }}">
                        <span class="tooltiptext">Aprovar Tema</span>

                        Aprovar <i class="fa fa-thumbs-up"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="active-modal"></div>
@endsection

@section('scripts')
    @include('admin::theme.javascript.show')
@endsection