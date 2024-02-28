<div class="modal fade" id="dropModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="dropModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route( 'post.delete', $post->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="dropModalLabel">Deletar Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <p>
                            Tem certeza que deseja deletar esse post?
                        </p>
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
