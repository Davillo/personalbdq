<div class="modal fade" id="removerQuestaoModal{{$questao->id}}" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="logo-modal text-center" id="removerModalLabel">Remover Questão</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                Deseja realmente remover a questão desta avaliação?
            </div>
            <div class="modal-footer">
                <form action="/avaliacao/questao/remover/{{$questao->id}}/{{$avaliacao->id}}" method="POST">
                    {{ method_field('DELETE') }}
                    {{csrf_field()}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </div>
        </div>
    </div>
</div>