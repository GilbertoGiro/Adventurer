<div class="modal">
    <div class="modal-content" style="width:55%;">
        <form method="post" style="margin:0 !important;">
            {{ csrf_field() }}

            <div class="modal-header background-strong-blue white">
                <h3 class="m-t-sm">
                    <span class="m-r-lg">
                        {{ $event->theme->titulo }}
                    </span>

                    <i class="fa fa-book right" style="margin-top:3px;"></i>
                </h3>
            </div>

            <div class="modal-body">
                <div class="inline-block align-top" style="width:30%;">
                    <div class="small-circular-image">
                        <img src="{{ asset('img/tasks/png/007-clipboard-2.png') }}" width="75px">
                    </div>
                </div>

                <div class="inline-block align-middle overflow-auto" style="width:65%;max-height:285px;padding-right:25px;">
                    <div class="block text-justify m-b-md">
                        <b class="block m-b-sm">Título:</b>

                        {!! $event->theme->titulo !!}
                    </div>

                    <div class="block text-justify m-b-md">
                        <b class="block m-b-sm">Lotação Máxima:</b>

                        {{ $event->limite }} pessoas
                    </div>

                    <div class="block text-justify m-b-md">
                        <b class="block m-b-sm">Descrição:</b>

                        {!! $event->theme->descricao !!}
                    </div>

                    <div class="block text-justify m-b-md">
                        <b class="block m-b-sm">Palestrante:</b>

                        {!! $event->palestrante !!}
                    </div>
                </div>
            </div>

            <div class="modal-footer text-right background-strong-blue white">
                <button type="button" class="button button-danger m-r-sm close-modal">Fechar <i class="fa fa-times"></i></button>
            </div>

            <input type="hidden" name="sttema" value="rep">
        </form>
    </div>
</div>