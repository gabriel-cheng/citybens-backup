<div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('users.edit', $user->id) }}" method="POST">
                <input type="hidden" name="id" value="{{ $user->id }}"  id="id">
                @csrf
                @method("PUT")
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="editModalLabel">Editar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="level">Nível</label>
                    <select name="level" id="level" class="form-control {{ $errors->has('level')  ? 'is-invalid' : '' }}">
                        <option value="seller">Vendedor</option>
                        <option value="coordinator">Coordenador</option>
                        <option value="admin">Administrador</option>
                        <option value="marketing">Marketing</option>
                    </select>
                    @if ($errors->has('level'))
                        <div class="invalid-feedback">{{ $errors->first('level') }}</div>
                    @endif

                    @if ($user->level == 'seller')
                        <label for="coordinator_id">Coordenador</label>
                        <select name="coordinator_id" id="coordinator_id" class="form-control {{ $errors->has('coordinator_id')  ? 'is-invalid' : '' }}">
                            <option value="null">Selecione um Coordenador</option>
                            @forelse ($coordinators as $coordinator)
                                <option value="{{ $coordinator->id }}">{{ $coordinator->name }}</option>
                            @empty
                                <option value="null">Nenhum Coordenador Cadastrado</option>
                            @endforelse
                        </select>
                        @if ($errors->has('coordinator_id'))
                        <div class="invalid-feedback">{{ $errors->first('coordinator_id') }}</div>
                    @endif
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-warning">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
