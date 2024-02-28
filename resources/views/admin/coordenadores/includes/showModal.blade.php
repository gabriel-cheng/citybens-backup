<div class="modal fade" id="showModal-{{ $coordenador->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('coordenadores.update', $coordenador->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="showModalLabel">Coordenador: <b>{{ $coordenador->name }}</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="coordenador">Coordenador</label>
                        <input type="text" class="form-control" name="coordenador" id="coordenador" value="{{ $coordenador->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="vendedores">Vendedores</label>
                        <select name="vendedores" id="vendedores" class="form-control" style="width: 100% !important;" multiple>
                            @foreach ($vendedores as $vendedor)
                                <option value="{{ $vendedor->id }}">{{ $vendedor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-warning">Salvar alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
