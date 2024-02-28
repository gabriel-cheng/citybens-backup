<div class="modal fade" id="modalEdit-{{ $lance->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('lances.update', $lance->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Consórcio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-6">
                                <label for="cliente">Cliente</label>
                                <input type="text" name="cliente" id="cliente" class="form-control @error ('cliente') is-invalid @enderror" value="{{ $lance->cliente }}" required >
                                @error('cliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="responsavel">Consultor </label>
                                <input type="hidden" name="responsavel" value="{{ $lance->created_by }}">
                                <input type="text" id="responsavel" class="form-control @error ('responsavel') is-invalid @enderror" value="{{ $lance->createBy()->first()->name }}" readonly required>
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
                                <input type="hidden" name="administradora" value="{{ $lance->administradora }}">
                                <input type="text" id="administradora" class="form-control @error ('administradora') is-invalid @enderror" value="{{ $lance->administradora()->first()->administradora }}" required readonly>
                                @error('administradora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="grupo">Grupo</label>
                                <input type="hidden" name="grupo" value="{{ $lance->grupo }}">
                                <input type="text" id="grupo" class="form-control @error ('grupo') is-invalid @enderror" value="{{ $lance->grupo()->first()->grupo }}" required readonly>
                                @error('grupo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="cota">Cota</label>
                                <input type="text" name="cota" id="cota" class="form-control @error('cota') is-invalid @enderror" value="{{ $lance->cota }}" readonly required>
                                @error('cota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12">
                                <label for="lance-fixo-edit">Lance Fixo</label>
                                <select name="lance-fixo" id="lance-fixo-edit"
                                    class="form-control @error ('lance-fixo') is-invalid @enderror lance-fixo" data-id="{{ $lance->id }}" required>
                                    <option value='0' selected>0% | R$ 0,00</option>
                                    @forelse ($lance->grupo()->first()->lancesFixos()->get() as $lance_fixo)
                                        <option @if ($lance->valor_lance_fixo == $lance_fixo->lance_valor) selected @endif value="{{ (($lance_fixo->lance_percentual / 100) * $lance->credito) }}"> {{ $lance_fixo->lance_percentual }}% | R${{ number_format((($lance_fixo->lance_percentual / 100) * $lance->credito), 2, ",", ".") }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('lance-fixo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            @if ($lance->grupo()->first()->administradora()->first()->tipos_lance == 'composto' || $lance->grupo()->first()->administradora()->first()->tipos_lance == 'livre')
                                <div class="col-12">
                                    <label for="lance-proprio-add">Lance Livre (%)</label>
                                    <input type="number" max="99" min="0" step="0.1" class="form-control @error ('lance-proprio') is-invalid @enderror lance-proprio"
                                    name="lance-proprio" value="{{ old('lance-proprio', $lance->porcentagem_lance_proprio) }}" id="lance-proprio-add" data-id="{{ $lance->id }}" required>
                                    @error('lance-proprio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif
                        </div>

                        <div class="form-row">
                            @if ($lance->grupo()->first()->administradora()->first()->tipos_lance == 'composto' || $lance->grupo()->first()->administradora()->first()->tipos_lance == 'fixo')
                                <div class="col-md-12">
                                    <label for="lance-embutido-add">Lance Embutido (%)</label>
                                    <input type="number" max="99" min="0" step="0.1" value="{{ old('lance-embutido', $lance->porcentagem_lance_embutido) }}" class="form-control @error ('lance-embutido-add') is-invalid @enderror lance-embutido"
                                    name="lance-embutido" id="lance-embutido-add" data-id="{{ $lance->id }}" required>
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
                                    <option @if (isset($lance) && !$lance->is_automatic || old('is_automatic') == 0) selected @endif value="0">Não</option>
                                    <option @if (isset($lance) &&  $lance->is_automatic || old('is_automatic') == 1) selected @endif value="1">Sim</option>
                                </select>
                                @error('quitacao_grupo_edit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="carta_avaliacao_add">Carta Avaliação (%)</label>
                                <input min="0" max="100" step="1" type="number" name="carta_avaliacao" id="carta_avaliacao_add"
                                    class="form-control @error ('carta_avaliacao') is-invalid @enderror carta_avaliacao"
                                    value="{{ old('carta_avaliacao', (($lance->carta_avaliacao * 100) / $lance->credito) ) }}" data-id="{{ $lance->id }}" required>
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
                                <input type="hidden" class="credito"  data-id="{{ $lance->id }}" value="{{ number_format($lance->credito, 2, ',', '')}}">
                                <input type="text" class="form-control @error ('credito') is-invalid @enderror credito" name="credito" id="credito_total" data-id="{{ $lance->id }}" value="{{ number_format($lance->credito, 2, ',', '.')}}" required readonly>
                            </div>
                            <div class="col">
                                <label for="lance-total">Lance Total (R$)</label>
                                <input type="text" class="form-control @error ('lance-total') is-invalid @enderror lance-total" name="lance-total" id="lance-total" value="{{ $lance->valor_lance_total }}" data-id="{{ $lance->id }}" readonly required>
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
                    <button type="submit" class="btn btn-warning">Editar</button>
                </div>
            </div>
        </form>
    </div>
</div>
