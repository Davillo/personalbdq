<div class="modal fade" id="adicionarSugestaoModal{{$questao->id}}" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h3 class="logo-modal text-center" id="removerModalLabel">Adicionar Sugestão</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form method="POST" action="/questao/comentario" >
            <div class="modal-body">
                Descreva o seu comentário
                    <div class="row">
                        <div class="input-group col-sm-10" style="text-align:center; margin: 0 auto; padding: 10px;">
                            {{csrf_field()}}
                            <textarea type="text" maxlength="100" class="form-control" name="comentario" placeholder="Max. 100 caracteres..."></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="{{$questao->id}}" name="questao_id">
                <input type="hidden" value="{{$listaAtual->id}}" name="lista_id">
                <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
            </form>
        </div>
    </div>
</div>