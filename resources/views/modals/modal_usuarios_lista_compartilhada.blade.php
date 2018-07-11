<div class="modal fade" id="compartilhadosModal{{$lista->id}}" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body modal-visualizar">
                <ul class="list-group">
                    <li class="list-group-item text-center"><strong>Compartilhado com</strong></li>
                    @foreach($compartilhadas as $compartilhada)
                        @if($compartilhada->lista_id == $lista->id)
                            @foreach($usuarios as $usuario)
                                @if($compartilhada->usuario_convidado_id == $usuario->id)
                                <li class="list-group-item">{{ $usuario->email }}
                                    <a href="/lista/compartilhar/excluir/{{$compartilhada->id}}" class="float-right">
                                        <i class="material-icons">
                                            clear
                                        </i>
                                    </a>
                                </li>

                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
