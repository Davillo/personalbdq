<div class="modal fade" id="removerModal{{$questao->id}}" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h3 class="logo-modal text-center" id="removerModalLabel">Remover Questão</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                Deseja realmente remover esta questão?
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

              <a href="/questao/excluir/{{$questao->id}}">  <button type="button" class="btn btn-danger">Remover</button></a>
            </div>
        </div>
    </div>
</div>