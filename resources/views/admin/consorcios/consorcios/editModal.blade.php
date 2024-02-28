<div class="modal fade" id="editModal-{{ $consorcio->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('consorcio.edit', $consorcio->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="editModalLabel">Editar consórcio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="cliente">Cliente</label>
                    <input type="text" name="cliente" id="cliente" class="form-control @error ('cliente') is-invalid @enderror" value="{{ old('cliente', $consorcio->cliente) }}" required>
                    @error('cliente')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="row">
                        <div class="col">
                            <label for="administradora">Administradora</label>
                            <select name="administradora" id="administradora" class="form-control @error ('administradora') is-invalid @enderror" required readonly>
                                <option disabled value="">---</option>
                                @forelse ($administradoras as $administradora)
                                    <option disabled @if ($consorcio->administradora == $administradora->id) selected @endif value="{{ $administradora->id }}">{{ $administradora->administradora }}</option>
                                @empty
                                    <option value="">Nenhuma administradora cadastrada</option>
                                @endforelse
                            </select>
                            @error('administradora')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="consultor">Consultor</label>
                            <select name="consultor" id="consultor" class="form-control @error ('consultor') is-invalid @enderror" required >
                                @forelse ($users as $user)
                                    <option  @if ($consorcio->consultor == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                @empty
                                    <option value="">Nenhum usuário cadastrado</option>
                                @endforelse
                            </select>
                            @error('consultor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="grupo">Grupo</label>
                            <select name="grupo" id="grupo" class="form-control @error ('grupo') is-invalid @enderror" required readonly>
                                <option disabled selected value="{{ $consorcio->grupo }}">{{ $consorcio->grupo()->first()->grupo }}</option>
                            </select>
                            @error('grupo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="cota">Cota</label>
                            <input type="text" name="cota" id="cota" class="form-control @error ('cota') is-invalid @enderror" value="{{ old('cota', $consorcio->cota) }}" required>
                            @error('cota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="credito">Crédito</label>
                            <input type="text" name="credito" id="credito-add" class="form-control money @error ('credito') is-invalid @enderror" value="{{ old('credito', $consorcio->credito * 100) }}" required>
                            @error('credito')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error ('status') is-invalid @enderror" required>
                                <option @if (isset($consorcio) && $consorcio->status == "andamento") selected @endif value="andamento">Andamento</option>
                                <option @if (isset($consorcio) && $consorcio->status == "atrasado") selected @endif value="atrasado">Atrasado</option>
                                <option @if (isset($consorcio) && $consorcio->status == "cancelado") selected @endif value="cancelado">Cancelado</option>
                                <option @if (isset($consorcio) && $consorcio->status == "contemplado") selected @endif value="contemplado">Contemplado</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fechar</button>
                    <button type="submit" class="btn btn-warning">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
