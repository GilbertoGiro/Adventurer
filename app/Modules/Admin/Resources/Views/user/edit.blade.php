@extends('admin::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option inline-block"><a class="milk text-decoration-none" href="{{ route('admin.user') }}">Lista de Usuários</a></li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">{{ $client->nome }}</li>
@endsection

@section('content')
    <div class="block p-md m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/083-address-book.png') }}" width="70px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm m-b-sm">Perfil - {{ $client->nome }}</h2>
            <p class="block m-b-sm">Modifique aqui todas as informações do <b>Usuário</b>.</p>
        </div>
    </div>

    <div class="p-md">
        <div class="card m-t-md" style="width:100%;">
            <div class="card-header background-weak-blue white">
                <h3 class="m-t-sm">
                    Editar o Usuário - {{ $client->nome }}

                    <i class="fa fa-user-circle right" style="margin-top:4px;"></i>
                </h3>
            </div>
            <div class="card-body text-center p-md">
                <div class="inline-block align-top p-sm m-l-md m-t-md">
                    <img src="{{ asset('img/blank-profile-picture.png') }}" width="135px">
                </div>

                <form action="" method="post" class="inline-block text-left align-top p-md m-l-md" style="width:80%;padding-bottom:0;">
                    <div class="form-group">
                        <label for="nome" class="block form-label"><b>Nome Completo:</b></label>
                        <input type="text" name="nome" class="form-input" value="{{ $client->nome }}" id="nome">
                    </div>
                    <div class="form-group m-t-md">
                        <label for="email" class="block form-label"><b>E-mail:</b></label>
                        <input type="email" name="email" class="form-input" value="{{ $client->email }}" id="email">
                    </div>
                    <div class="form-group m-t-md">
                        <label for="idpapel" class="block form-label"><b>Papel:</b></label>
                        <select name="idpapel" class="form-input" id="idpapel">
                            <option value="">Selecione uma opção</option>
                            @foreach($papers as $paper)
                                <option value="{{ $paper->id }}" {{ ($client->idpapel === $paper->id) ? 'selected' : '' }}>{{ $paper->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group m-t-md">
                        <span class="block"><b>Registrado em:</b> {{ (!empty($client->created_at)) ? (new \Carbon\Carbon($client->created_at))->format('d/m/Y H:i:s') : 'Não informado' }}</span>
                    </div>

                    <div class="form-group m-t-lg text-right">
                        <button class="button button-success">
                            Salvar Alterações <i class="fa fa-save"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection