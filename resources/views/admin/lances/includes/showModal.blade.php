<div class="modal fade bd-example-modal-lg" id="showModal" tabindex="-1" role="dialog" aria-labelledby="ShowModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" id="edit-lance-form">
                @csrf
                @method('PUT')
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="ShowModalTitle">Edição de Lance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="administradora-edit">Administradora</label>
                                <select name="administradora" id="administradora-edit" class="form-control {{ $errors->has('administradora')  ? 'is-invalid' : '' }}" required>
                                    <option value="">Selecione uma administradora</option>
                                    @forelse ($administradoras as $administradora)
                                        <option value="{{ $administradora->id }}">{{ $administradora->administradora }}</option>
                                    @empty
                                        <option value="">Nenhuma administradora cadastrada</option>
                                    @endforelse
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('administradora') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="grupo-edit">Grupo</label>
                                <input type="text" class="form-control {{ $errors->has('grupo')  ? 'is-invalid' : '' }}" name="grupo" id="grupo-edit" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('grupo') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="cota-edit">Cota</label>
                                <input type="text" class="form-control {{ $errors->has('cota')  ? 'is-invalid' : '' }}" name="cota" id="cota-edit" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('cota') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="credito-edit">Crédito (R$)</label>
                                <input type="text" min="0" class="form-control money {{ $errors->has('credito')  ? 'is-invalid' : '' }}" name="credito" id="credito-edit" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('credito') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="quitacao_grupo">Quitação do Grupo</label>
                                <input type="checkbox" name="quitacao_grupo" id="quitacao_grupo" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="carta_avaliacao-edit">Carta Avaliação (R$)</label>
                                <input type="text" value="0" name="carta_avaliacao" id="carta_avaliacao-edit" class="form-control money {{ $errors->has('carta_avaliacao') }}" value="{{ old('carta_avaliacao') }}" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('carta_avaliacao') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="lance-embutido-edit">Lance Embutido (R$)</label>
                                <select name="lance-embutido" id="lance-embutido-edit" class="form-control money {{ $errors->has('lance-embutido')  ? 'is-invalid' : '' }}" required></select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('lance-embutido') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="lance-proprio-edit">Lance Proprio (R$)</label>
                                <input type="text" value="0" class="form-control money {{ $errors->has('lance-proprio')  ? 'is-invalid' : '' }}" name="lance-proprio" id="lance-proprio-edit" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('lance-proprio') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="lance-total-edit">Lance Total (R$)</label>
                                <input type="text" tabindex="-1" value="0" class="form-control {{ $errors->has('lance-total')  ? 'is-invalid' : '' }}" name="lance-total" id="lance-total-edit" readonly required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('lance-total') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="cliente-edit">Cliente</label>
                                <input type="text" name="cliente" id="cliente-edit" class="form-control {{ $errors->has('cliente-edit') ? 'is-invalid' : '' }}" value="{{ old('cliente') }}" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('cliente-edit') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="responsavel-edit">Responsável</label>
                                <select name="responsavel" id="responsavel-edit" class="form-control  {{ $errors->has('responsavel')  ? 'is-invalid' : '' }}" required disabled readonly>
                                    @if (auth()->user()->level == 'seller')
                                        <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                                    @else
                                        @forelse ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @empty
                                            <option value="">Nenhum usuário cadastrado</option>
                                        @endforelse
                                    @endif
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('responsavel') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="status-edit">Status</label>
                                <select name="status" id="status-edit" class="form-control {{ $errors->has('status')  ? 'is-invalid' : '' }}" @if (auth()->user()->level == "seller") disabled @endif required>
                                    <option value="Lance Criado">Lance Criado</option>
                                    <option value="Lance Confirmado">Lance Confirmado</option>
                                    <option value="Lance Premiado">Lance Premiado</option>
                                    <option value="Lance Pago">Lance Pago</option>
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="Cancelado">Cancelado</option>
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            </div>
                        </div>
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
