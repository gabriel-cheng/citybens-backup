<div class="modal fade" id="editModal-{{ $lance->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('lances.fixos.update', $lance->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="editModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="credito">Crédito</label>
                    <input type="text" id="credito" class="form-control" readonly value="{{ number_format($grupo->credito, '2', ',', '.') }}">

                    <label for="lance_percentual">Lance (%)</label>
                    <input type="number" name="lance_percentual" id="lance_percentual" class="form-control" step="0.1" min="0" max="100" value="{{ $lance->lance_percentual }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-warning">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
