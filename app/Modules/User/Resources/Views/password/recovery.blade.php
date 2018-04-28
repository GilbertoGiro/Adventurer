@extends('user::layouts.login')

@section('content')
    <div class="recovery-form card">
        <div class="recovery-form-header white background-strong-blue">
            <h3 class="m-t-sm">
                Solicitação de Alteração de Senha

                <i class="fa fa-key right" style="margin-top:3px;"></i>
            </h3>
        </div>
        <div class="recovery-form-body">
            <div class="small-circular-image">
                <img src="{{ asset('img/tasks/png/034-dossier-2.png') }}" class="m-l-md" width="80px">
            </div>
            
            <form action="" method="POST" class="m-t-sm">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="password" class="form-label">Nova Senha</label>
                    <input type="password" name="senha" class="form-input" id="password" placeholder="************">
                </div>

                <div class="form-group m-t-md">
                    <label for="password_confirmation" class="form-label">Repita a Senha</label>
                    <input type="password" name="repita" class="form-input" id="password_confirmation" placeholder="************">
                </div>

                <div class="form-group m-t-md">
                    <button class="button button-success" style="width:100%;">
                        Trocar a Senha <i class="fa fa-lock"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="recovery-form-footer background-strong-blue text-center white">
            <b>Obs.</b> Caso não tenha solicitado, favor ignorar.
        </div>
    </div>
@endsection

@section('scripts')
@endsection