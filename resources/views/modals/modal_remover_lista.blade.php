<div class="modal fade" id="removerModal" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h3 class="logo-modal text-center" id="removerModalLabel">Remover Lista</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                Deseja realmente remover esta lista?
                <strong class="text-danger">Obs: ao remover essa lista você excluirá todas as questões da mesma.</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

              <a href="/lista/excluir/{{$lista->id}}">  <button type="button" class="btn btn-danger">Remover</button></a>
            </div>
        </div>
    </div>
</div>