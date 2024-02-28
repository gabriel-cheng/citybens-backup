<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="AddModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('coordenadores.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="AddModalTitle">Adicionar Coordenadores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="coordenadores">Novos Coordenadores</label>
                    <select name="coordenadores" id="coordenadores" multiple style="width: 100% !important;">
                        @forelse ($vendedores as $vendedor)
                            <option value="{{ $vendedor->id }}">{{ $vendedor->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('coordenadores') }}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
  </div>
