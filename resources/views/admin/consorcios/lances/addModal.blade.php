<div class="modal fade" id="addModal-{{ $consorcio->id }}" tabindex="-1" role="dialog" aria-labelledby="AddModalTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                            <div class="col-6">
                                <label for="cliente">Cliente</label>
                                <input type="text" name="cliente" id="cliente" class="form-control @error ('cliente') is-invalid @enderror" value="{{ $consorcio->cliente }}" required readonly>
                                @error('cliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="responsavel">Consultor</label>
                                <input type="hidden" name="responsavel" value="{{ $consorcio->consultor }}">
                                <input type="text" id="responsavel" class="form-control @error ('responsavel') is-invalid @enderror" value="{{ $consorcio->consultor()->first()->name }}" required readonly>
                                @error('responsavel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-6">
                                <label for="administradora">Administradora</label>
                                <input type="hidden" name="administradora" value="{{ $consorcio->administradora }}">
                                <input type="text" id="administradora" class="form-control @error ('administradora') is-invalid @enderror" value="{{ $consorcio->administradora()->first()->administradora }}" required readonly>
                                @error('administradora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="grupo">Grupo</label>
                                <input type="hidden" name="grupo" value="{{ $consorcio->grupo }}">
                                <input type="text" id="grupo" class="form-control @error ('grupo') is-invalid @enderror" value="{{ $consorcio->grupo()->first()->grupo }}" required readonly>
                                @error('grupo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="cota">Cota</label>
                                <input type="text" name="cota" id="cota" class="form-control @error('cota') is-invalid @enderror" value="{{ $consorcio->cota }}" readonly required>
                                @error('cota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12">
                                <label for="lance-fixo-add">Lance Fixo</label>
                                <select name="lance-fixo" id="lance-fixo-add"
                                    class="form-control @error ('lance-fixo') is-invalid @enderror lance-fixo" data-id="{{ $consorcio->id }}" required>
                                    <option value='0' selected>0% | R$ 0,00</option>
                                    @forelse ($consorcio->grupo()->first()->lancesFixos()->get() as $lance)
                                        <option value="{{ (($lance->lance_percentual / 100) * $consorcio->credito) }}"> {{ $lance->lance_percentual }}% | R${{ number_format((($lance->lance_percentual / 100) * $consorcio->credito), 2, ",", ".") }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('lance-fixo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @if ($consorcio->administradora()->first()->tipos_lance == 'composto' || $consorcio->administradora()->first()->tipos_lance == 'livre')
                                <div class="col-12">
                                    <label for="lance-proprio-add">Lance Livre (%)</label>
                                    <input type="number" max="99" min="0" step="0.1" class="form-control @error ('lance-proprio') is-invalid @enderror lance-proprio"
                                    name="lance-proprio" value="{{ old('lance-proprio', 0) }}" id="lance-proprio-add" data-id="{{ $consorcio->id }}" required>
                                    @error('lance-proprio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif

                            @if ($consorcio->administradora()->first()->tipos_lance == 'composto' || $consorcio->administradora()->first()->tipos_lance == 'fixo')
                                <div class="col-md-12">
                                    <label for="lance-embutido-add">Lance Embutido (%)</label>
                                    <input type="number" max="99" min="0" step="0.1" value="0" class="form-control @error ('lance-embutido-add') is-invalid @enderror lance-embutido"
                                    name="lance-embutido" id="lance-embutido-add" data-id="{{ $consorcio->id }}" required>
                                    @error('lance-embutido-add')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="quitacao_grupo_edit">Quitação do Grupo</label>
                                <input type="checkbox" name="quitacao_grupo" id="quitacao_grupo_edit"
                                    class="form-control">
                                @error('quitacao_grupo_edit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="quitacao_grupo_edit">Lance Automático</label>
                                <select name="is_automatic" id="is_automatic" class="form-control @error ('is_automatic') is-invalid @enderror" required>
                                    <option @if (old('is_automatic') == 0) selected @endif value="0">Não</option>
                                    <option @if (old('is_automatic') == 1) selected @endif value="1">Sim</option>
                                </select>
                                @error('quitacao_grupo_edit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="carta_avaliacao_add">Carta Avaliação (%)</label>
                                <input value="0" min="0" max="100" step="0.1" type="number" name="carta_avaliacao" id="carta_avaliacao_add"
                                    class="form-control @error ('carta_avaliacao') is-invalid @enderror carta_avaliacao"
                                    value="{{ old('carta_avaliacao') }}" data-id="{{ $consorcio->id }}" required>
                                @error('carta_avaliacao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="credito">Crédito (R$)</label>
                                <input type="hidden" class="credito"  data-id="{{ $consorcio->id }}" value="{{ number_format($consorcio->credito, 2, ',', '')}}">
                                <input type="text" class="form-control @error ('credito') is-invalid @enderror credito" name="credito" id="credito_total" data-id="{{ $consorcio->id }}" value="{{ number_format($consorcio->credito, 2, ',', '.')}}" required readonly>
                            </div>
                            <div class="col">
                                <label for="lance-total">Lance Total (R$)</label>
                                <input type="text" class="form-control @error ('lance-total') is-invalid @enderror lance-total" name="lance-total" id="lance-total" data-id="{{ $consorcio->id }}" readonly required>
                                @error('lance-total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success"><i class="far fa-futbol"></i> &nbsp;GOL</button>
                </div>
            </form>
        </div>
    </div>
</div>
