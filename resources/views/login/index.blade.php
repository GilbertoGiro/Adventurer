@extends('layouts.app')

@section('content')
    <div class="m-b-md m-l-sm">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/tasks/png/009-notes-7.png') }}" width="75px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="roboto m-t-sm">Quais as benefícios da aplicação?</h2>
            <p class="m-t-sm">Aqui você encontra informações referente a alguns <b>benefícios</b> proporcionados por nossa aplicação</p>
        </div>
    </div>

    <div class="p-sm m-b-lg flex">
        <div class="card block m-r-sm" style="width:24%;">
            <div class="card-header text-center background-red">
                <h3 class="m-t-sm white">Inscrição Facilitada</h3>
            </div>
            <div class="card-body p-sm m-t-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/046-ticket.png') }}" width="70px">
                </div>

                <div class="block text-justify p-md">
                    <ul style="padding-left:25px;">
                        <li class="m-t-sm">Processos de cadastro simplificados</li>
                        <li class="m-t-sm">As incrições podem ser realizadas de várias maneiras</li>
                        <li class="m-t-sm"><b>Sem necessidade de uma conta</b></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card block m-r-sm m-l-sm" style="width:24%;">
            <div class="card-header text-center background-gold">
                <h3 class="m-t-sm white">Sugestão de Temas</h3>
            </div>
            <div class="card-body p-sm m-t-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/036-microphone.png') }}" width="70px">
                </div>

                <div class="block text-justify p-md">
                    <ul style="padding-left:25px;">
                        <li class="m-t-sm">Suas ideias viram palestras</li>
                        <li class="m-t-sm">Qualquer tema é válido, desde que em contexto próprio</li>
                        <li class="m-t-sm"><b>Sem necessidade de uma conta</b></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card block m-l-sm m-r-sm" style="width:24%;">
            <div class="card-header text-center background-bronze">
                <h3 class="m-t-sm white">Relatórios Semanais</h3>
            </div>
            <div class="card-body p-sm m-t-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/018-list.png') }}" width="70px">
                </div>

                <div class="block text-justify p-md">
                    <ul style="padding-left:25px;">
                        <li class="m-t-sm">Informações claras e bem estruturadas</li>
                        <li class="m-t-sm">A responsabilidade de te manter atualizado é nossa</li>
                        <li class="m-t-sm"><b>Sem necessidade de uma conta</b></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card block m-l-sm m-r-sm" style="width:24%;">
            <div class="card-header text-center background-goldilocks">
                <h3 class="m-t-sm white">Pontos de Participação</h3>
            </div>
            <div class="card-body p-sm m-t-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/007-present.png') }}" width="70px">
                </div>

                <div class="block text-justify p-md">
                    <ul style="padding-left:25px;">
                        <li class="m-t-sm">A sua participação é importante para nós</li>
                        <li class="m-t-sm">Pontos podem ser utilizados como meio de seleção</li>
                        <li class="m-t-sm"><b>Necessário possuir conta</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="m-b-lg m-l-sm m-t-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/tasks/png/034-dossier-2.png') }}" width="75px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="roboto m-t-sm">Efetuar Login/Cadastro</h2>
            <p class="m-t-sm">Simples, rápido e uma grande gama de benefícios. E aí, está esperando o que para fazer seu cadastro?</p>
        </div>
    </div>

    <div class="p-sm text-center">
        <div class="card text-center block m-r-md" style="width:32%;">
            <div class="card-header background-weak-blue">
                <h3 class="m-t-sm white">Já possui conta? Efetue o login aqui!</h3>
            </div>
            <div class="card-body p-sm m-t-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/016-graduation-hat.png') }}" width="65px">
                </div>

                <form class="block p-md" method="post" action="">
                    <div class="form-group">
                        <input type="email" name="email" class="form-input" placeholder="E-mail">
                    </div>

                    <div class="form-group">
                        <input type="password" name="senha" class="form-input" placeholder="Senha">
                    </div>

                    <div class="form-group m-t-sm">
                        <button type="submit" class="button button-success form-input">Efetuar o Login <i class="fa fa-sign-in-alt"></i></button>
                        <button type="submit" class="button button-warning form-input">Esqueci minha Senha <i class="fa fa-question-circle"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-footer background-weak-blue">
                <span class="inline-block">
                    <i class="fab fa-facebook-square medium white"></i>
                </span>
                <span class="inline-block m-l-sm">
                    <i class="fab fa-twitter-square medium white"></i>
                </span>
                <span class="inline-block m-l-sm">
                    <i class="fa fa-envelope-square medium white"></i>
                </span>
                <span class="inline-block m-l-sm">
                    <i class="fab fa-linkedin medium white"></i>
                </span>
            </div>
        </div>
        <div class="card text-center block m-r-md" style="width:32%;">
            <div class="card-header background-weak-blue">
                <h3 class="m-t-sm white">Não possui uma conta? Crie agora mesmo!</h3>
            </div>
            <div class="card-body p-sm m-t-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/035-barrier.png') }}" width="65px">
                </div>

                <form class="block p-md" method="post" action="">
                    <div class="form-group">
                        <input type="text" name="nome" class="form-input" placeholder="Nome" value="{{ old('nome') }}">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-input" placeholder="E-mail" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <select name="flexterno" class="form-input">
                            <option value="">Aluno externo?</option>
                            @foreach(App\Utilities\Arrays::conditional() as $key => $value)
                                <option value="{{ $value }}" {{ ($value == old('')) }}>{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="curso" class="form-input none">
                            <option value="">Curso</option>
                            <option value="ads">Análise e Desenvolvimento de Sistemas</option>
                            <option value="gti">Gestão da Tecnologia da Informação</option>
                            <option value="gam">Gestão Ambiental</option>
                            <option value="eve">Eventos</option>
                            <option value="adm">Administração</option>
                        </select>
                    </div>

                    <div class="form-group m-t-sm">
                        <button type="submit" class="button button-success form-input">Cadastrar Conta <i class="fa fa-sign-in-alt"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-footer background-weak-blue">
                <span class="inline-block">
                    <i class="fab fa-facebook-square medium white"></i>
                </span>
                <span class="inline-block m-l-sm">
                    <i class="fab fa-twitter-square medium white"></i>
                </span>
                <span class="inline-block m-l-sm">
                    <i class="fa fa-envelope-square medium white"></i>
                </span>
                <span class="inline-block m-l-sm">
                    <i class="fab fa-linkedin medium white"></i>
                </span>
            </div>
        </div>

        <div class="card text-center block" style="width:32%;">
            <div class="card-header background-weak-blue">
                <h3 class="m-t-sm white">Deseja receber notificações de eventos?</h3>
            </div>
            <div class="card-body p-sm m-t-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/009-invitation.png') }}" width="65px">
                </div>

                <form class="block p-md" method="post" action="">
                    <div class="form-group">
                        <input type="text" name="nome" class="form-input" placeholder="Nome">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-input" placeholder="E-mail">
                    </div>

                    <div class="form-group">
                        <select name="curso" class="form-input">
                            <option value="">Curso</option>
                            <option value="ads">Análise e Desenvolvimento de Sistemas</option>
                            <option value="gti">Gestão da Tecnologia da Informação</option>
                            <option value="gam">Gestão Ambiental</option>
                            <option value="eve">Eventos</option>
                            <option value="adm">Administração</option>
                        </select>
                    </div>

                    <div class="form-group m-t-sm">
                        <button type="submit" class="button button-success form-input">Habilitar E-mails <i class="fa fa-envelope"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-footer background-weak-blue">
                <span class="inline-block">
                    <i class="fab fa-facebook-square medium white"></i>
                </span>
                <span class="inline-block m-l-sm">
                    <i class="fab fa-twitter-square medium white"></i>
                </span>
                <span class="inline-block m-l-sm">
                    <i class="fa fa-envelope-square medium white"></i>
                </span>
                <span class="inline-block m-l-sm">
                    <i class="fab fa-linkedin medium white"></i>
                </span>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection