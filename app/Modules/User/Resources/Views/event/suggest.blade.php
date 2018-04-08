@extends('user::layouts.app')

@section('path')
    <li class="option disabled-option inline-block">Página Inicial</li>
    <li class="option-arrow white inline-block"><i class="fa fa-arrow-right"></i></li>
    <li class="option disabled-option inline-block">Sugestão de Temas</li>
@endsection

@section('content')
    <div class="block p-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/tasks/png/036-dossier-1.png') }}" width="80px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Temas - Cadastro de uma Sugestão de Tema</h2>
        </div>
    </div>

    <div class="block p-md">
        <div class="card" style="width:100%;">
            <div class="card-header background-strong-blue white">
                <h3 class="m-t-sm">
                    Formulário de Inscrição - Novos Temas

                    <i class="fa fa-book right" style="margin-top:2px;"></i>
                </h3>
            </div>

            <div class="card-body p-md" style="padding:6px 12px 6px 12px;">
                <form action="" class="p-sm" style="padding-bottom:0">
                    <h3 class="m-t-sm header">Informações Pessoais</h3>

                    <div class="p-sm">
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-input" id="nome" placeholder="Nome">
                        </div>

                        <div class="form-group m-t-md">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-input" id="email" placeholder="E-mail">
                        </div>

                        <div class="form-group m-t-md">
                            <label for="curso" class="form-label">Curso</label>
                            <select name="curso" class="form-input" id="curso">
                                <option value="">Selecione o curso</option>
                                <option value="all">Todos</option>
                                <option value="ads">Análise e Desenvolvimento de Sistemas</option>
                                <option value="gti">Gestão da Tecnologia da Informação</option>
                                <option value="gam">Gestão Ambiental</option>
                                <option value="eve">Eventos</option>
                                <option value="adm">Administração</option>
                            </select>
                        </div>
                    </div>

                    <h3 class="m-t-md header">Informações do Tema</h3>

                    <div class="p-sm">
                        <div class="form-group">
                            <label for="tema" class="form-label">Nome do Tema</label>
                            <input name="tema" type="text" class="form-input" id="tema" placeholder="Nome do Tema">
                        </div>

                        <div class="form-group m-t-md">
                            <label for="descricao" class="form-label">Descrição do Tema</label>
                            <textarea name="descricao" class="form-text-area" id="descricao" placeholder="Descrição do Tema"></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right m-t-md">
                        <button class="button button-success">
                            Enviar Solicitação <i class="fa fa-rocket"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="block p-md">
        <div class="inline-block align-middle">
            <img src="{{ asset('img/seo-marketing/png/074-analytics-6.png') }}" width="80px">
        </div>

        <div class="inline-block align-middle m-l-md">
            <h2 class="m-t-sm">Aprovações - Relações por Curso</h2>
        </div>
    </div>

    <div class="flex text-center p-sm m-t-sm">
        <div class="card m-l-md m-r-md" style="width:32%;">
            <div class="card-header background-strong-blue text-left white">
                <h3 class="m-t-sm dots">Análise e Desenvolvimento de Sistemas</h3>
            </div>
            <div class="card-body p-md">
                <div class="block small-circular-image">
                    <img src="{{ asset('img/tasks/png/018-clipboard-1.png') }}" width="70px" class="m-l-md">
                </div>

                <div class="block m-t-sm p-sm">
                    <table>
                        <thead class="background-weak-blue white">
                            <tr>
                                <th>Pendentes</th>
                                <th>Aprovadas</th>
                                <th>Reprovadas</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>15</td>
                                <td>8</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card m-l-md m-r-md" style="width:32%;">
            <div class="card-header background-strong-blue text-left white">
                <h3 class="m-t-sm dots">Gestão de Tecnologia da Informação</h3>
            </div>
            <div class="card-body p-md">
                <div class="block small-circular-image">
                    <img src="{{ asset('img/tasks/png/018-clipboard-1.png') }}" width="70px" class="m-l-md">
                </div>

                <div class="block m-t-sm p-sm">
                    <table>
                        <thead class="background-weak-blue white">
                            <tr>
                                <th>Pendentes</th>
                                <th>Aprovadas</th>
                                <th>Reprovadas</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>15</td>
                                <td>8</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card m-l-md m-r-md" style="width:32%;">
            <div class="card-header background-strong-blue text-left white">
                <h3 class="m-t-sm dots">Eventos</h3>
            </div>
            <div class="card-body p-md">
                <div class="block small-circular-image">
                    <img src="{{ asset('img/tasks/png/018-clipboard-1.png') }}" width="70px" class="m-l-md">
                </div>

                <div class="block m-t-sm p-sm">
                    <table>
                        <thead class="background-weak-blue white">
                            <tr>
                                <th>Pendentes</th>
                                <th>Aprovadas</th>
                                <th>Reprovadas</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>15</td>
                                <td>8</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="flex text-center p-sm m-t-md">
        <div class="card m-l-md m-r-md" style="width:32%;">
            <div class="card-header background-strong-blue text-left white">
                <h3 class="m-t-sm dots">Gestão Ambiental</h3>
            </div>
            <div class="card-body p-md">
                <div class="block small-circular-image">
                    <img src="{{ asset('img/tasks/png/018-clipboard-1.png') }}" width="70px" class="m-l-md">
                </div>

                <div class="block m-t-sm p-sm">
                    <table>
                        <thead class="background-weak-blue white">
                            <tr>
                                <th>Pendentes</th>
                                <th>Aprovadas</th>
                                <th>Reprovadas</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>15</td>
                                <td>8</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card m-l-md m-r-md" style="width:32%;">
            <div class="card-header background-strong-blue text-left white">
                <h3 class="m-t-sm dots">Administração</h3>
            </div>
            <div class="card-body p-md">
                <div class="block small-circular-image">
                    <img src="{{ asset('img/tasks/png/018-clipboard-1.png') }}" width="70px" class="m-l-md">
                </div>

                <div class="block m-t-sm p-sm">
                    <table>
                        <thead class="background-weak-blue white">
                            <tr>
                                <th>Pendentes</th>
                                <th>Aprovadas</th>
                                <th>Reprovadas</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>15</td>
                                <td>8</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection