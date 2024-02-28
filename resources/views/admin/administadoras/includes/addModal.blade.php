<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="AddModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('administradoras.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="AddModalTitle">Cadastro de Administradoras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="administradora">Administradora</label>
                        <input type="text" class="form-control {{ $errors->has('administradora')  ? 'is-invalid' : '' }}" name="administradora" id="administradora" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('administradora') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="assembleia">Data da Assembleia</label>
                        <input type="number" min="0" max="30" class="form-control {{ $errors->has('assembleia')  ? 'is-invalid' : '' }}" name="assembleia" id="assembleia" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('assembleia') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipos_lance">Tipos de Lance</label>
                        <select name="tipos_lance" id="tipos_lance" class="form-control @error ('tipos_lance') is-invalid @enderror" required>
                            <option value="">Selecione os tipos de lance</option>
                            <option value="livre">Apenas Lances Livre</option>
                            <option value="fixo">Apenas Lances Fixo</option>
                            <option value="composto">Apenas Lances Fixos + Livres</option>
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('tipos_lance') }}
                        </div>
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
