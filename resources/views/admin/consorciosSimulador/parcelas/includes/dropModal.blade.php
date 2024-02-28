<div class="modal fade" id="dropModal-{{ $parcela->id }}" tabindex="-1" role="dialog" aria-labelledby="dropModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('parcelas.drop', $parcela->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="dropModalLabel">Apagar Parcela</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja apagar essa parcela?
                    {{$consorcio->bem}}
                    {{$consorcio->credito}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fechar</button>
                    <button type="submit" class="btn btn-danger">Apagar</button>
                </div>
            </form>
        </div>
    </div>
</div>
