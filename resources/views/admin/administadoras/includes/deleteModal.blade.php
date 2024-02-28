<div class="modal fade" id="deleteModal-{{ $administradora->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('administradoras.delete', $administradora->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="deleteModalLabel">Deletar Administradora</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja deletar a administradora <b>{{ $administradora->administradora }}</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>
