<div class="modal fade" id="visualizarModal{{$questao->id}}" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body modal-visualizar">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Enunciado:</strong> {{ $questao->enunciado }}</li>
                    <li class="list-group-item"><strong>Categoria:</strong> {{ $questao->categoria }}</li>
                    <li class="list-group-item"><strong>Tipo:</strong> {{$questao->tipo}}</li>
                    <li class="list-group-item"><strong>Dificuldade:</strong> {{$questao->dificuldade}}</li>
                    <li class="list-group-item"><strong>Palavras-chave:</strong> {{$questao->palavras_chave}}</li>
                    @if($questao->tipo == 'Múltipla Escolha' || $questao->tipo == 'Asserção Razão' || $questao->tipo == 'Verdadeiro ou Falso')
                        @foreach($alternativas as $alternativa )
                            @if($alternativa->questao_id == $questao->id)
                                @if($alternativa->correta == true)
                                    <li class="list-group-item">
                                        <i class="material-icons text-success p-0 m-0">
                                            done
                                        </i><br>
                                        <strong>Alternativa:</strong> {{$alternativa->enunciado}}
                                    </li>
                                @else
                                    <li class="list-group-item"><strong>Alternativa:</strong> {{$alternativa->enunciado}}</li>
                                @endif
                            @endif
                        @endforeach
                    @endif

                </ul></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>