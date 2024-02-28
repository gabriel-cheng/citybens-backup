<div class="modal fade" id="aproveModal-{{ $lance->id }}" tabindex="-1" role="dialog" aria-labelledby="aproveModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('lances.aprove', $lance->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="aproveModalLabel">Aprovar lance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja aprovar esse lance?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Aprovar</button>
                </div>
            </div>
        </form>
    </div>
</div>
