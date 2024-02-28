<div class="modal fade" id="deleteModal-{{ $coordenador->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('coordenadores.drop', $coordenador->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="deleteModalLabel">Tornar Vendedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja tornar <b>{{ $coordenador->name }}</b> um vendedor novamente?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger">Tornar Vendedor</button>
                </div>
            </form>
        </div>
    </div>
</div>
