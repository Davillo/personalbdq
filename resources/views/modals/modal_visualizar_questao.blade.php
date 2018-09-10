<div class="modal fade " id="visualizarModal{{$questao->id}}" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-visualizar">
            <div class="modal-body ">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Enunciado:</strong> {{ strip_tags($questao->enunciado) }}</li>
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

                </ul>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Comentários:</strong></li>

                    @if(count($comentarios) != 0)
                        @foreach($comentarios as $count => $comentario )
                            @if($comentario->questao_id == $questao->id)
                                <li class="list-group-item">
                                    <div class="card" >
                                        <div class="card-body">
                                            @foreach($usuarios as $usuario)
                                                @if($usuario->id == $comentario->autor_usuario_id)
                                                    <h6 class="card-subtitle mb-2 text-muted">{{$usuario->nome}}</h6>
                                                    @break
                                                @endif
                                            @endforeach
                                                    <p class="card-text">
                                                {{$comentario->comentario}}
                                            </p>
                                            @if($questao->autor_usuario_id == \Illuminate\Support\Facades\Auth::user()->id)
                                                    <a href="/questao/comentario/excluir/{{$comentario->id}}" class="card-link float-right mb-1 pb-1">Excluir</a>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @else
                                <?php $count++ ?>
                            @endif
                            @if(count($comentarios) == $count)
                                <li class="list-group-item">Nenhum comentário foi feito.</li>
                            @endif
                        @endforeach
                    @else
                        <li class="list-group-item">Nenhum comentário foi feito.</li>
                    @endif

                </ul>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>