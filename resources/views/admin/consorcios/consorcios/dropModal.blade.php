<div class="modal fade" id="dropModal-{{ $consorcio->id }}" tabindex="-1" role="dialog" aria-labelledby="dropModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('consorcio.delete', $consorcio->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="dropModalLabel">Editar Consórcio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja apagar o consórcio?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fechar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </form>
    </div>
</div>
