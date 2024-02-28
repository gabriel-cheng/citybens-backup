<div class="modal fade  bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('store.post') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Criar Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" class="form-control {{ $errors->has('title')  ? 'is-invalid' : '' }}" required>
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="cover">Capa</label>
                        <input
                            type="file"
                            class="form-control {{ $errors->has('cover') ? "is-invalid" : '' }}"
                            id="cover"
                            name="cover"
                            value="{{ old('cover') }}">
                        @if ($errors->has('cover'))
                            <div class="invalid-feedback">{{ $errors->first('cover') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select class="form-control select2" style="width: 100%;" name="tags[]" id="tags" required multiple="multiple">
                            @forelse($tags as $tag)
                                <option value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        @if ($errors->has('tags'))
                            <div class="invalid-feedback">{{ $errors->first('tags') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="short_description">Descrição curta</label>
                        <textarea
                            name="short_description"
                            id="short_description"
                            class="form-control {{ $errors->has('short_description') ? "is-invalid" : '' }}"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea
                            type="text"
                            class="form-control {{ $errors->has('description') ? "is-invalid" : '' }}"
                            id="description"
                            name="description"
                            required>{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="status">Status: <small>Ativado / Desativado</small></label>
                        <input
                            type="checkbox"
                            class="form-control {{ $errors->has('status') ? "is-invalid" : '' }}"
                            id="status"
                            name="status"
                            value="1"
                            checked>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Postar</button>
                </div>
            </div>
        </form>
    </div>
</div>
