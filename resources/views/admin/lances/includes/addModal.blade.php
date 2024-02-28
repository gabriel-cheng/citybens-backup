<div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="AddModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('lances.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="AddModalTitle">Cadastro de Lance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="administradora">Administradora</label>
                                <select name="administradora" id="administradora" class="form-control {{ $errors->has('administradora')  ? 'is-invalid' : '' }}" required>
                                    <option value="" selected>Selecione uma administradora</option>
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
                            <div class="col-md-3">
                                <label for="grupo">Grupo</label>
                                <select name="grupo" id="grupo" class="form-control {{ $errors->has('grupo')  ? 'is-invalid' : '' }}">
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('grupo') }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="cota">Cota</label>
                                <input type="number" min="0" class="form-control {{ $errors->has('cota')  ? 'is-invalid' : '' }}" name="cota" id="cota" value="{{ old('cota') }}" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('cota') }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="credito-add">Crédito (R$)</label>
                                <input type="text" min="0" class="form-control money {{ $errors->has('credito')  ? 'is-invalid' : '' }}" name="credito" id="credito-add"  value="{{ old('credito') }}" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('credito') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="cliente">Cliente</label>
                                <input type="text" name="cliente" id="cliente" class="form-control {{ $errors->has('cliente') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('cliente') }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="responsavel">Responsável</label>
                                <select name="responsavel" id="responsavel" class="form-control {{ $errors->has('responsavel')  ? 'is-invalid' : '' }}" required @if (auth()->user()->level == 'seller') readonly @endif>
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
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="lance-embutido-add">Lance Embutido (R$)</label>
                                <select name="lance-embutido" id="lance-embutido-add" class="form-control {{ $errors->has('lance-embutido')  ? 'is-invalid' : '' }}" required>
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('lance-embutido') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="lance-proprio-add">Lance Proprio (R$)</label>
                                <input type="text" value="0" class="form-control money {{ $errors->has('lance-proprio')  ? 'is-invalid' : '' }}" name="lance-proprio" value="{{ old('lance-proprio') }}" id="lance-proprio-add" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('lance-proprio') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="lance-total-soma">Lance Total (R$)</label>
                                <input type="text" tabindex="-1" min="0" class="form-control money {{ $errors->has('lance-total')  ? 'is-invalid' : '' }}" name="lance-total" id="lance-total-soma" value="{{ old('lance-total') }}" readonly required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('lance-total') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="quitacao_grupo_edit">Quitação do Grupo</label>
                                <input type="checkbox" name="quitacao_grupo" id="quitacao_grupo_edit" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="carta_avaliacao_add">Carta Avaliação (R$)</label>
                                <input value="0" type="text" name="carta_avaliacao" id="carta_avaliacao_add" class="form-control money {{ $errors->has('carta_avaliacao') }}" value="{{ old('carta_avaliacao') }}" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('carta_avaliacao') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="historico" class="d-none"><button type="button" class="btn btn-primary btn-historico">Histórico</button></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success"><i class="far fa-futbol"></i> &nbsp;GOL</button>
                </div>
            </form>
        </div>
    </div>
  </div>
