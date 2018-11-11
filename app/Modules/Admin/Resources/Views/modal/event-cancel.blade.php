<div class="modal">
    <div class="modal-content">
        <form action="{{ route('admin.event.cancel', $event->id) }}" method="post" style="margin:0 !important;">
            {{ csrf_field() }}

            <div class="modal-header background-strong-blue white">
                <h3 class="m-t-sm m-b-sm">
                    Cancelar Evento

                    <i class="fa fa-times right" style="margin-top:2px;"></i>
                </h3>
            </div>
            <div class="modal-body">
                Você tem certeza de que realmente deseja cancelar o <b>evento</b> selecionado?
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="button button-danger m-r-sm close-modal">Cancelar <i
                            class="fa fa-times"></i></button>
                <button type="submit" class="button button-success">Prosseguir <i
                            class="fa fa-check"></i></button>
            </div>
        </form>
    </div>
</div>