<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('parcelas.store') }}" method="post">
                @csrf
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="addModalLabel">Adicionar Parcela</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="consorcio_simulator_id" value="{{ $consorcio->id }}">

                    <label for="parcelas">Quantidade de Parcelas</label>
                    <input type="text" name="parcelas" id="parcelas" class="form-control {{ $errors->has('parcelas')  ? 'is-invalid' : '' }}" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('parcelas') }}
                    </div>

                    <label for="valor_parcela">Valor da Parcela (R$)</label>
                    <input type="text" name="valor_parcela" id="valor_parcela" class="form-control money {{ $errors->has('valor_parcela')  ? 'is-invalid' : '' }}" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('valor_parcela') }}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
