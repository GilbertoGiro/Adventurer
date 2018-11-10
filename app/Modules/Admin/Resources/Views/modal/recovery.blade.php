<div class="modal">
    <div class="modal-content">
        <form action="{{ route('admin.recovery.request') }}" method="post" style="margin:0 !important;">
            {{ csrf_field() }}

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

                    <div class="form-group">
                        <label for="forgot-email"><b>Informe seu E-mail:</b></label>
                        <input type="email" name="email" class="form-input" id="forgot-email" placeholder="example@example.com.br">
                    </div>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="button button-danger m-r-sm close-modal">Cancelar <i class="fa fa-times"></i></button>
                <button type="submit" class="button button-success">Recuperar <i class="fa fa-shield-alt"></i></button>
            </div>
        </form>
    </div>
</div>