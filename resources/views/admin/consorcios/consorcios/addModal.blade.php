<div class="modal fade" id="addConsorcioModal" tabindex="-1" role="dialog" aria-labelledby="addConsorcioModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('consorcio.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="addConsorcioModalLabel">Adicionar Consórcio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="cliente">Cliente</label>
                    <input type="text" name="cliente" id="cliente" class="form-control @error ('cliente') is-invalid @enderror" value="{{ old('cliente') }}" required>
                    @error('cliente')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="row">
                        <div class="col">
                            <label for="administradora">Administradora</label>
                            <select name="administradora" id="administradora" class="form-control @error ('administradora') is-invalid @enderror" required>
                                <option value="">---</option>
                                @forelse ($administradoras as $administradora)
                                    <option value="{{ $administradora->id }}">{{ $administradora->administradora }}</option>
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
                            <select name="consultor" id="consultor" class="form-control @error ('consultor') is-invalid @enderror" required>
                                @forelse ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                            <select name="grupo" id="grupo" class="form-control @error ('grupo') is-invalid @enderror" required>
                            </select>
                            @error('grupo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="cota">Cota</label>
                            <input type="text" name="cota" id="cota" class="form-control @error ('cota') is-invalid @enderror" value="{{ old('cota') }}" required>
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
                            <input type="text" name="credito" id="credito-add" class="form-control money @error ('credito') is-invalid @enderror" value="{{ old('credito') }}" required>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
