@extends('user::layouts.login')

@section('content')
    <div class="login-form card">
        <div class="login-form-body">
            <div class="login-form-header background-strong-blue">
                <h2 class="m-t-sm m-b-sm text-center white m-b-md">Adventurer</h2>

                <div class="small-circular-image background-white">
                    <img src="{{ asset('img/adventurer.png') }}" width="135px" style="padding-left:18px;">
                </div>

                <p class="m-t-md m-b-md text-center white">Tudo o que você precisa... E mais um pouco!</p>
            </div>

            <div class="login-form-body-content">
                <h2 class="header m-t-sm">
                    Adventurer - <span class="strong-blue">Autenticação de Usuário</span>:

                    <i class="fas fa-cog fa-spin strong-blue right"></i>
                </h2>

                <form action="">

                </form>
            </div>
        </div>
    </div>
@endsection