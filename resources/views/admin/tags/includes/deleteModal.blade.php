<div class="modal fade" id="dropModal-{{ $tag->id }}" tabindex="-1" role="dialog" aria-labelledby="dropModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route( 'tags.delete', $tag->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="dropModalLabel">Deletar Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <p>
                            Tem certeza que deseja deletar a tag?
                        </p>
                        <p style="text-align: center; width: 30%; color: {{ $tag->text_color }}; background-color: {{ $tag->background_color }}">{{ $tag->name }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </form>
    </div>
</div>
