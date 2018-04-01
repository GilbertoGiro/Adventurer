@extends('user::layouts.login')

@section('content')
    <div class="login-form card">
        <div class="login-form-body">
            <div class="login-form-header background-strong-blue">
                <h2 class="m-t-sm m-b-sm text-center white m-b-md">Adventurer</h2>

                <div class="small-circular-image background-white">
                    <img src="{{ asset('img/adventurer.png') }}" width="135px" style="padding-left:20px;">
                </div>

                <p class="m-t-md m-b-md text-center white">Tudo o que você precisa... E mais um pouco!</p>
            </div>

            <div class="login-form-body-content">
                <h2 class="header m-t-sm">
                    Adventurer - <span class="strong-blue">Autenticação de Usuário</span>:

                    <i class="fas fa-cog fa-spin strong-blue right"></i>
                </h2>

                <div class="block m-b-md" style="font-size:15px;">
                    Com nosso sistema você fica por dentro de tudo o que está acontecendo na faculdade deixando todo o trabalho duro conosco e se preocupando apenas
                    em aprender e/ou ensinar.
                </div>

                <form action="">
                    <div class="form-group m-t-md">
                        <label for="email" class="form-label bold">E-mail</label>
                        <input type="email" class="form-input" id="email" placeholder="exemplo@exemplo.com.br">
                    </div>

                    <div class="form-group m-t-md">
                        <label for="" class="form-label bold">Senha</label>
                        <input type="password" class="form-input" placeholder="************">
                    </div>

                    <div class="form-group m-t-md text-right">
                        <button class="button button-warning m-r-sm">Esqueci minha Senha <i class="fa fa-question-circle"></i></button>
                        <button class="button button-success">Efetuar o Login <i class="fa fa-user-circle"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection