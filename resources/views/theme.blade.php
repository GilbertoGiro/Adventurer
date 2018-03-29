@extends('layouts.app')

@section('content')
    <h2 class="roboto header m-t-sm">Possui alguma ideia de tema?</h2>

    <div class="block m-b-md">
        Tem interesse em algo que deseja ver na Faculdade? Compartilhe conosco! O conhecimento é uma via de 2 sentidos, ou seja, você compartilha seu conhecimento (ideias) conosco
        e nós lhe ajudamos a trabalhar esses conteúdos de maneira mais abrangente.
    </div>

    <div class="block text-center p-md">
        <div class="inline-block align-top" style="width:250px;">
            <figure class="m-b-sm m-t-sm m-l-sm m-r-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/tasks/png/003-mail.png') }}" width="65px">
                </div>
                <figcaption class="m-t-sm">
                    Você nos mostra sua <b>ideia</b>
                </figcaption>
            </figure>
        </div>

        <i class="fa fa-arrow-right align-middle medium m-l-sm m-r-sm"></i>

        <div class="inline-block align-middle" style="width:250px;">
            <figure class="m-b-sm m-t-sm m-l-sm m-r-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/tasks/png/018-clipboard-1.png') }}" width="65px">
                </div>
                <figcaption class="m-t-sm">
                    Ela passa por uma <b>Análise</b> e <b>Aprovação</b>
                </figcaption>
            </figure>
        </div>

        <i class="fa fa-arrow-right align-middle medium m-l-sm m-r-sm"></i>

        <div class="inline-block align-middle" style="width:250px;">
            <figure class="m-b-sm m-t-sm m-l-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/tasks/png/008-notes-8.png') }}" width="65px">
                </div>
                <figcaption class="m-t-sm">
                    E caso <span class="green bold">aprovada</span>, um evento é criado
                </figcaption>
            </figure>
        </div>

        <i class="fa fa-arrow-right align-middle medium m-l-sm m-r-sm"></i>

        <div class="inline-block align-middle" style="width:250px;">
            <figure class="m-b-sm m-t-sm m-l-sm">
                <div class="small-circular-image">
                    <img src="{{ asset('img/tasks/png/022-whiteboard.png') }}" width="65px">
                </div>
                <figcaption class="m-t-sm">
                    Em seguida basta <b>inscrever-se</b> e <b>aproveitar</b>
                </figcaption>
            </figure>
        </div>
    </div>

    <div class="block text-center p-sm">
        <div class="card m-r-md" style="width:55%;">
            <div class="card-header text-left background-strong-blue">
                <h3 class="m-t-sm white">
                    Explique-nos qual é a sua ideia
                    <i class="fa fa-lightbulb right"></i>
                </h3>
            </div>
            <div class="card-body text-left">
                <form action="" method="post" class="p-md">
                    <div class="form-group">
                        <label for="" class="bold">Nome do Tema/Conteúdo:</label>
                        <input type="text" class="form-input" placeholder="Exemplo">
                    </div>

                    <div class="form-group m-t-md">
                        <label for="" class="bold">Curso Associado:</label>
                        <select name="" class="form-input">
                            <option value="">Selecione o curso</option>
                            <option value="all">Todos</option>
                            <option value="ads">Análise e Desenvolvimento de Sistemas</option>
                            <option value="gti">Gestão da Tecnologia da Informação</option>
                            <option value="gam">Gestão Ambiental</option>
                            <option value="eve">Eventos</option>
                            <option value="adm">Administração</option>
                        </select>
                    </div>

                    <div class="form-group m-t-md">
                        <label for="" class="bold">Evento Interno e/ou Externo à Faculdade?</label>
                        <select name="" class="form-input">
                            <option value="">Selecione uma opção</option>
                            <option value="s">Sim</option>
                            <option value="n">Não</option>
                        </select>
                    </div>

                    <div class="form-group m-t-md">
                        <label for="" class="bold">Breve descrição do Tema:</label>
                        <textarea name="" class="form-text-area" placeholder="Descrição de exemplo..."></textarea>
                    </div>

                    <div class="form-group m-t-md text-right">
                        <button type="submit" class="button button-warning">Verificar Existência <i class="fa fa-search"></i></button>
                        <button type="submit" class="button button-success m-l-sm">Submeter Tema <i class="fa fa-envelope"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card" style="width:42%;">
            <div class="card-header text-left background-strong-blue">
                <h3 class="m-t-sm white">
                    Quem é você? Não seja tímido <i class="fa fa-heart red"></i>
                    <i class="fa fa-user-secret right"></i>
                </h3>
            </div>
            <div class="card-body text-left p-md">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nome" class="bold">Nome:</label>
                        <input type="text" name="nome" class="form-input" id="nome" placeholder="Exemplo">
                    </div>

                    <div class="form-group m-t-md">
                        <label for="email" class="bold">E-mail</label>
                        <input type="email" name="email" class="form-input" id="email" placeholder="exemplo@exemplo.com.br">
                    </div>

                    <div class="form-group m-t-md">
                        <label for="" class="bold">Aluno Externo à Faculdade?</label>
                        <select name="" class="form-input" id="">
                            <option value="">Selecione uma opção</option>
                            <option value="s">Sim</option>
                            <option value="n">Não</option>
                        </select>
                    </div>

                    <div class="form-group m-t-md">
                        <label for="curso" class="bold">Curso</label>
                        <select name="curso" class="form-input" id="curso">
                            <option value="">Selecione um curso</option>
                            <option value="ads">Análise e Desenvolvimento de Sistemas</option>
                            <option value="gti">Gestão da Tecnologia da Informação</option>
                            <option value="gam">Gestão Ambiental</option>
                            <option value="eve">Eventos</option>
                            <option value="adm">Administração</option>
                        </select>
                    </div>

                    <div class="form-group text-right m-t-md">
                        <button class="button button-warning">Usar informações do Cadastro <i class="fa fa-user-circle"></i></button>
                        <button class="button button-success m-l-sm">Submeter <i class="fa fa-plane"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection