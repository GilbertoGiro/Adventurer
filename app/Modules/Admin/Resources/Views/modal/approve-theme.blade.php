<div class="modal">
    <div class="modal-content">
        <form method="post" style="margin:0 !important;">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="modal-header background-strong-blue white">
                <h3 class="m-t-sm">
                    <span class="m-r-lg">
                        Deseja realmente aprovar o tema?
                    </span>

                    <i class="fa fa-book right" style="margin-top:3px;"></i>
                </h3>
            </div>
            <div class="modal-body">
                <div class="inline-block align-middle" style="width:30%;">
                    <div class="small-circular-image">
                        <img src="{{ asset('img/seo-marketing/png/054-chart-1.png') }}" width="75px">
                    </div>
                </div>

                <div class="inline-block align-middle" style="width:65%;">
                    <div class="block small text-justify m-b-md">
                        Lembre-se de que ao realizar essa ação, a mesma não poderá ser desfeita, sendo possível apenas <b class="red">inativar</b> o tema aprovado.
                    </div>
                </div>
            </div>

            <div class="modal-footer background-strong-blue text-right">
                <button type="button" class="button button-danger m-r-sm close-modal">Cancelar <i class="fa fa-times"></i></button>
                <button type="submit" class="button button-success">Confirmar <i class="fa fa-check"></i></button>
            </div>

            <input type="hidden" name="sttema" value="apr">
        </form>
    </div>
</div>