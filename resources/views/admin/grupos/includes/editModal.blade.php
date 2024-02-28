<div class="modal fade" id="editModal-{{ $grupo->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('grupos.update', $grupo->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="editModalLabel">Editar Grupo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="administradora_id">Administradora</label>
                    <select name="administradora_id" id="administradora_id" class="form-control {{ $errors->has('administradora_id')  ? 'is-invalid' : '' }}" required>
                        <option value="">Selecione a Administradora</option>
                        @forelse ($administradoras as $administradora)
                            <option @if ($grupo->administradora_id == $administradora->id) selected @endif value="{{ $administradora->id }}">{{ $administradora->administradora }}</option>
                        @empty
                            <option value="">Nenhuma Administradora Cadastrada</option>
                        @endforelse
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('administradora_id') }}
                    </div>

                    <label for="grupo">Grupo</label>
                    <input type="text" name="grupo" value="{{ $grupo->grupo }}" id="grupo" class="form-control {{ $errors->has('grupo')  ? 'is-invalid' : '' }}" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('grupo') }}
                    </div>

                    <label for="bem">Bem</label>
                    <select name="bem" id="bem" class="form-control {{ $errors->has('bem')  ? 'is-invalid' : '' }}" required>
                        <option value="" selected>Selecione o tipo do bem</option>
                        <option @if ($grupo->bem == 'auto') selected @endif value="auto">Automóvel</option>
                        <option @if ($grupo->bem == 'eletro') selected @endif value="eletro">Eletroeletrônico</option>
                        <option @if ($grupo->bem == 'imovel') selected @endif value="imovel">Imovel</option>
                        <option @if ($grupo->bem == 'moto') selected @endif value="moto">Moto</option>
                        <option @if ($grupo->bem == 'pesado') selected @endif value="pesado">Pesado</option>
                        <option @if ($grupo->bem == 'servico') selected @endif value="servico">Serviço</option>
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('bem') }}
                    </div>

                    <label for="credito">Crédito</label>
                    <input type="text" value="{{ $grupo->credito }}" name="credito" id="credito" class="form-control money {{ $errors->has('credito')  ? 'is-invalid' : '' }}" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('credito') }}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-warning">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
