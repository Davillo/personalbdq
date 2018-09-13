<div class="modal fade" id="removerModal{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h3 class="logo-modal text-center" id="removerModalLabel">Remover Usuario</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                Deseja realmente remover este usuário?{{$usuario->id}}
            </div>
            <div class="modal-footer">
                <form action="/usuario/excluir/{{$usuario->id}}" method="POST">
                    {{ method_field('DELETE') }}
                    {{csrf_field()}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </div>
        </div>
    </div>
</div>