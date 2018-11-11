<div class="modal">
    <div class="modal-content">
        <form action="{{ url('usuario/eventos/' . $event->id) }}" method="post" style="margin:0 !important;">
            {{ csrf_field() }}

            <div class="modal-header background-strong-blue white">
                <h3 class="m-t-sm">
                    Solicitar Participação
                    <i class="fa fa-key right" style="margin-top:3px;"></i>
                </h3>
            </div>
            <div class="modal-body">
                <div class="block small text-justify m-b-md">
                    Para concluir essa solicitação, basta clicar na opção <b>confirmar</b> que encontra-se abaixo.
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="button button-danger m-r-sm close-modal">
                    Cancelar <i class="fa fa-times"></i>
                </button>
                <button type="submit" class="button button-success">
                    Confirmar <i class="fa fa-check"></i>
                </button>
            </div>
        </form>
    </div>
</div>