<div class="modal fade" id="clonarQuestaoModal{{$questao->id}}" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h3 class="logo-modal mx-auto" id="removerModalLabel">Fazer cópia questão</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form @submit="getCheckClonarQuestao" method="POST" action="/questao/clonar" >
                {{ csrf_field() }}
            <div class="modal-body">
                <p>Deseja adicionar a questão em qual lista?</p>
                    <div class="row">
                        <div class="col-md-9 mx-auto">
                            @if(count($listasUsuario)>0)
                                <select v-model="nomeListaQuestao" name="lista_id" class="form-control borda-input">
                                    <option value="">Selecione a lista...</option>
                                        @foreach($listasUsuario as $lista)
                                            <option value="{{$lista->id}}">{{$lista->nome}}</option>
                                        @endforeach
                                </select>
                                <label v-if="errors.clonarQuestao" class="text-danger" v-cloak>@{{errors.clonarQuestao}}</label>                                
                            @else
                                <label class="text-danger text-center" for="Não existe Listas">Você não possuí listas cadastradas</label>
                            @endif
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="{{$questao->id}}" name="questao_id">
                @if(count($listasUsuario)>0)
                <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
                @else
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                @endif                
            </div> 
            </div>
            </form>
        </div>
    </div>
</div>