<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('simulador.store') }}" method="post">
                @csrf
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="addModalLabel">Adicionar Consórcio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="administradora">Administradora</label>
                    <select class="form-control {{ $errors->has('administradora_id')  ? 'is-invalid' : '' }}" name="administradora_id" id="administradora_id" required>
                        <option value="">Selecione uma administradora</option>
                        @forelse ($administradoras as $administradora)
                            <option value="{{ $administradora->id }}">{{ $administradora->administradora }}</option>
                        @empty
                            <option value="">Nenhuma administradora cadastrada</option>
                        @endforelse
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('administradora_id') }}
                    </div>

                    <label for="credito">Crédito (R$)</label>
                    <input type="text" name="credito" id="credito" class="form-control money {{ $errors->has('credito')  ? 'is-invalid' : '' }}" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('credito') }}
                    </div>

                    <label for="taxa_administracao">Taxa de Administração</label>
                    <input type="text" name="taxa_administracao" id="taxa_administracao" class="form-control {{ $errors->has('taxa_administracao')  ? 'is-invalid' : '' }}" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('taxa_administracao') }}
                    </div>

                    <label for="bem">Bem</label>
                    <select name="bem" id="bem" class="form-control {{ $errors->has('bem')  ? 'is-invalid' : '' }}" required>
                        <option value="" selected>Selecione o tipo do bem</option>
                        <option value="Automovel">Automóvel</option>
                        <option value="Eletroeletrônicos">Eletroeletrônico</option>
                        <option value="Imóvel">Imovel</option>
                        <option value="Moto">Moto</option>
                        <option value="Pesados">Pesado</option>
                        <option value="Serviços">Serviço</option>
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('bem') }}
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
