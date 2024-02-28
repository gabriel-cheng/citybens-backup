<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('lances.fixos.store', $grupo->id) }}" method="POST">
                @csrf
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="addModalLabel">Criar Lance Fixo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="credito">Crédito</label>
                    <input type="text" id="credito" class="form-control" readonly value="{{ number_format($grupo->credito, '2', ',', '.') }}">

                    <label for="lance_percentual">Lance (%)</label>
                    <input type="number" name="lance_percentual" id="lance_percentual" class="form-control" step="0.1" min="0" max="100">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
