<div class="modal">
    <div class="modal-content">
        <form action="" method="post" style="margin:0 !important;">
            {{ csrf_field() }}

            <div class="modal-header background-strong-blue white">
                <h3 class="m-t-sm m-b-sm">
                    Notificar Participantes

                    <i class="fa fa-phone right" style="margin-top:3px;"></i>
                </h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="notification_id">Notificação</label>
                    <select name="id" class="form-input" id="notification_id">
                        <option value="">Selecione uma opção</option>
                        @foreach($notifications as $notification)
                            <option value="{{ $notification->id }}">
                                {{ $notification->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="button button-danger m-r-sm close-modal">Cancelar <i
                            class="fa fa-times"></i></button>
                <button type="button" class="button button-success notify-participants-confirm">Notificar <i
                            class="fa fa-paper-plane"></i></button>
            </div>
        </form>
    </div>
</div>