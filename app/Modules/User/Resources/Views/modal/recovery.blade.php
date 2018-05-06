<div class="modal">
    <div class="modal-content">
        <div class="modal-header background-strong-blue white">
            <h3 class="m-t-sm">
                    <span class="m-r-lg">
                        Esqueceu sua senha?
                    </span>

                <i class="fa fa-key right" style="margin-top:3px;"></i>
            </h3>
        </div>
        <div class="modal-body">
            <div class="inline-block align-middle" style="width:30%;">
                <div class="small-circular-image">
                    <img src="{{ asset('img/seo-marketing/png/016-flag.png') }}" class="m-l-md" width="75px">
                </div>
            </div>
            <div class="inline-block align-middle" style="width:65%;">
                <div class="block small text-justify m-b-md">
                    Informe o seu e-mail para recuperar sua senha. Caso ainda não tenha uma conta, basta <a
                            href="">clicar aqui</a> para criar uma.
                </div>

                <form action="" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="forgot-email"><b>Informe seu E-mail:</b></label>
                        <input type="email" class="form-input" id="forgot-email" placeholder="example@example.com.br">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer background-strong-blue text-right">
            <button class="button button-danger m-r-sm close-modal">Cancelar <i class="fa fa-times"></i></button>
            <button class="button button-success">Recuperar <i class="fa fa-shield-alt"></i></button>
        </div>
    </div>
</div>