<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('grupos.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="addModalLabel">Criar Grupo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="administradora_id">Administradora</label>
                    <select name="administradora_id" id="administradora_id" class="form-control {{ $errors->has('administradora_id')  ? 'is-invalid' : '' }}" required>
                        <option value="">Selecione a Administradora</option>
                        @forelse ($administradoras as $administradora)
                            <option value="{{ $administradora->id }}">{{ $administradora->administradora }}</option>
                        @empty
                            <option value="">Nenhuma Administradora Cadastrada</option>
                        @endforelse
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('administradora_id') }}
                    </div>

                    <label for="grupo">Grupo</label>
                    <input type="text" name="grupo" id="grupo" class="form-control {{ $errors->has('grupo')  ? 'is-invalid' : '' }}" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('grupo') }}
                    </div>

                    <label for="bem">Bem</label>
                    <select name="bem" id="bem" class="form-control {{ $errors->has('bem')  ? 'is-invalid' : '' }}" required>
                        <option value="" selected>Selecione o tipo do bem</option>
                        <option value="auto">Automóvel</option>
                        <option value="eletro">Eletroeletrônico</option>
                        <option value="imovel">Imovel</option>
                        <option value="moto">Moto</option>
                        <option value="pesado">Pesado</option>
                        <option value="servico">Serviço</option>
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('bem') }}
                    </div>

                    <label for="credito">Crédito</label>
                    <input type="text" name="credito" id="credito" class="form-control money {{ $errors->has('credito')  ? 'is-invalid' : '' }}" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('credito') }}
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
