<div class="modal fade" id="fazerCopiaModal{{$questao->id}}" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h3 class="logo-modal text-center" id="removerModalLabel">Fazer cópia questão</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="POST" action="/questao/fazerCopia" >
            <div class="modal-body">
                Deseja adicionar a questão em qual lista?
                    <div class="row">
                        <div class="input-group col-sm-10" style="text-align:center; margin: 0 auto; padding: 10px;">
                            @if(count($listasUsuario)>0)
                                {{ csrf_field() }}
                                <select name="lista_id" class="form-control">
                                    <option value="">Selecione a lista...</option>
                                        @foreach($listasUsuario as $lista)
                                            <option value="{{$lista->id}}">{{$lista->nome}}</option>
                                        @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="{{$questao->id}}" name="questao_id">
                <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
            </form>
        </div>
    </div>
</div>