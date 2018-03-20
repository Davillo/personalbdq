<div class="modal fade" id="removerModal" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h3 class="logo-modal text-center" id="removerModalLabel">Remover Curso</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                Deseja realmente remover este curso?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

              <a href="/curso/excluir/{{$curso->id}}">  <button type="button" class="btn btn-danger">Remover</button></a>
            </div>
        </div>
    </div>
</div>