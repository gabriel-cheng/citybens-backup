<div class="modal fade" id="editModal-{{ $consorcio->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('simulador.update', $consorcio->id) }}" method="post">
                @csrf
                @method("PUT")
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="editModalLabel">Editar Consórcio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="administradora">Administradora</label>
                    <select class="form-control {{ $errors->has('administradora_id')  ? 'is-invalid' : '' }}" name="administradora_id" id="administradora_id" required>
                        <option value="">Selecione uma administradora</option>
                        @forelse ($administradoras as $administradora)
                            <option @if ($consorcio->administradora->id == $administradora->id) selected @endif value="{{ $administradora->id }}">{{ $administradora->administradora }}</option>
                        @empty
                            <option value="">Nenhuma administradora cadastrada</option>
                        @endforelse
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('administradora_id') }}
                    </div>

                    <label for="credito">Crédito (R$)</label>
                    <input type="text" value="{{ $consorcio->credito }}" name="credito" id="credito" class="form-control money {{ $errors->has('credito')  ? 'is-invalid' : '' }}" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('credito') }}
                    </div>

                    <label for="taxa_administracao">Taxa de Administração</label>
                    <input type="text" value="{{ $consorcio->taxa_administracao }}" name="taxa_administracao" id="taxa_administracao" class="form-control {{ $errors->has('taxa_administracao')  ? 'is-invalid' : '' }}" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('taxa_administracao') }}
                    </div>

                    <label for="bem">Bem</label>
                    <select name="bem" id="bem" class="form-control {{ $errors->has('bem')  ? 'is-invalid' : '' }}" required>
                        <option value="" selected>Selecione o tipo do bem</option>
                        <option @if ($consorcio->bem == 'Automovel') selected @endif value="auto">Automóvel</option>
                        <option @if ($consorcio->bem == 'Eletroeletrônicos') selected @endif value="eletro">Eletroeletrônico</option>
                        <option @if ($consorcio->bem == 'Imóvel') selected @endif value="imovel">Imovel</option>
                        <option @if ($consorcio->bem == 'Moto') selected @endif value="moto">Moto</option>
                        <option @if ($consorcio->bem == 'Pesados') selected @endif value="pesado">Pesado</option>
                        <option @if ($consorcio->bem == 'Serviços') selected @endif value="servico">Serviço</option>
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('bem') }}
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
