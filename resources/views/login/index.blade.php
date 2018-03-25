@extends('layouts.app')

@section('content')
    <h2 class="roboto header m-t-sm">Quais as funcionalidades da aplicação?</h2>

    <div class="p-sm text-center m-b-lg">
        <div class="card block" style="width:24%;">
            <div class="card-header text-center background-red">
                <h3 class="m-t-sm white">Inscrição Facilitada</h3>
            </div>
            <div class="card-body p-sm m-t-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/046-ticket.png') }}" width="70px">
                </div>

                <div class="block text-justify p-md">
                    Verificou algum evento/palestra que gerou um certo interesse? Para inscrever-se na mesma você apenas precisa entrar
                    na página de informações desta e clicar em <b>Participar</b> (Caso tenha uma conta). Não possui uma conta? Fique tranquilo,
                    você pode inscrever-se em quaisquer eventos não privados sem precisar criar uma. E aí? Agora qual é a sua desculpa para não participar?
                </div>
            </div>
        </div>

        <div class="card block m-l-sm" style="width:24%;">
            <div class="card-header text-center background-gold">
                <h3 class="m-t-sm white">Sugestão de Temas</h3>
            </div>
            <div class="card-body p-sm m-t-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/036-microphone.png') }}" width="70px">
                </div>

                <div class="block text-justify p-md">
                    Aqui você (Usuário) tem uma participação indiscutível. Suas <b>ideias</b> de temas podem se tornar realidade. Funciona mais ou menos assim:
                    Você cadastra sua ideia, nossos administradores verificam a mesma e aprovam e/ou reprovam (Dependendo da ideia) e a partir dessa momento ela
                    tem a possibilidade de ficar disponível para todos os usuários. Os seus temas favoritos também são os nossos.
                </div>
            </div>
        </div>

        <div class="card block m-l-sm" style="width:24%;">
            <div class="card-header text-center background-bronze">
                <h3 class="m-t-sm white">Relatórios Semanais</h3>
            </div>
            <div class="card-body p-sm m-t-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/018-list.png') }}" width="70px">
                </div>

                <div class="block text-justify p-md">
                    Fique tranquilo! Você não precisará entrar na aplicação para ficar por dentro de tudo que está acontecendo. Nosso sistema disponibiliza
                    um meio de enviar <b>notificações</b> sempre que novos eventos de determinadas matérias, ou não, forem disponibilizados. Aqui nós nos responsabilizamos
                    pelo "trabalho duro" e você só precisa aproveitar. <b>Obs:</b> Você precisa habilitar essa opção.
                </div>
            </div>
        </div>

        <div class="card block m-l-sm" style="width:24%;">
            <div class="card-header text-center background-goldilocks">
                <h3 class="m-t-sm white">Pontos de Participação</h3>
            </div>
            <div class="card-body p-sm m-t-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/event/png/007-present.png') }}" width="70px">
                </div>

                <div class="block text-justify p-md">
                    Espera aí, por incrível que pareça ainda não acabou. Além de tudo isso que mostramos, você ainda receberá pontos por sua participação nos eventos. E adivinha só! Esses pontos
                    podem ser utilizados pelos nossos administradores como um meio de seleção de alunos para a participação em eventos futuros. Sua participação nos eventos realmente importa para nós.
                </div>
            </div>
        </div>
    </div>

    <h2 class="roboto header m-t-sm">Efetuar Login/Cadastro</h2>

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
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="password" name="senha" class="form-input" placeholder="Senha">
                    </div>

                    <div class="form-group">
                        <input type="password" name="repeticao" class="form-input" placeholder="Repita a Senha">
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