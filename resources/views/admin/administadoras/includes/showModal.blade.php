<div class="modal fade" id="showModal-{{ $administradora->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('administradora.update', $administradora->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="showModalLabel">Administradora</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="administradora">Administradora</label>
                        <input type="text" class="form-control {{ $errors->has('administradora')  ? 'is-invalid' : '' }}" value="{{ $administradora->administradora }}" name="administradora" id="administradora" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('administradora') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="assembleia">Data da Assembleia</label>
                        <input type="number" min="0" max="30" class="form-control {{ $errors->has('assembleia')  ? 'is-invalid' : '' }}" value="{{ $administradora->dia_assembleia }}" name="assembleia" id="assembleia" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('assembleia') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipos_lance">Tipos de Lance</label>
                        <select name="tipos_lance" id="tipos_lance" class="form-control @error ('tipos_lance') is-invalid @enderror" required>
                            <option value="">Selecione os tipos de lance</option>
                            <option @if ($administradora->tipos_lance == 'livre') selected @endif value="livre">Apenas Lances Livre</option>
                            <option @if ($administradora->tipos_lance == 'fixo') selected @endif value="fixo">Apenas Lances Fixo</option>
                            <option @if ($administradora->tipos_lance == 'composto') selected @endif value="composto">Apenas Lances Fixos + Livres</option>
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('tipos_lance') }}
                        </div>
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
