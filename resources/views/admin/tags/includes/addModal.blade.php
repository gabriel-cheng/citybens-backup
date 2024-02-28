<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="name">TAG</label>
                    <input type="text" name="name" id="name" class="form-control {{ $errors->has('name')  ? 'is-invalid' : '' }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif

                    <label for="text_color">Cor do Texto</label>
                    <input type="color" name="text_color" id="text_color" class="form-control {{ $errors->has('text_color')  ? 'is-invalid' : '' }}" required>
                    @if ($errors->has('text_color'))
                        <div class="invalid-feedback">{{ $errors->first('text_color') }}</div>
                    @endif

                    <label for="background_color">Cor do Background</label>
                    <input type="color" name="background_color" id="background_color" class="form-control {{ $errors->has('background_color')  ? 'is-invalid' : '' }}" required>
                    @if ($errors->has('background_color'))
                        <div class="invalid-feedback">{{ $errors->first('background_color') }}</div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
