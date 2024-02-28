@extends('adminlte::page')

@section('title', 'Posts')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h2 class="card-title">Posts</h2>
                        <button class="btn btn-success" data-toggle="modal" data-target="#addModal" type="button">Criar</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Descrição Curta</th>
                                <th>Autor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->short_description }}</td>
                                    <td>{{ $post->author()->first()->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="buldEditModal({{ $post->id }})">Editar</button>
                                        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#dropModal-{{ $post->id }}">Deletar</button>
                                    </td>
                                </tr>
                                @include('admin.blog.includes.dropModal')
                            @empty
                                <td class="text-center" colspan="4">Nenhum foi feito ainda</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $posts->links() }}
                    @include('admin.blog.includes.addModal')
                    @include('admin.blog.includes.editModal')
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        @if ( count($errors) )
            $('#addModal').modal('show');
        @endif
    </script>

    <script>
        function buldEditModal(id){
            let route = `/posts/${id}`;

            $.get(
                route,
                {

                },
                function(e) {
                    $("#title_edit").val(e.post.title);
                    $("#short_description_edit").val(e.post.short_description);
                    $("textarea#description_edit").val(e.post.description);
                    $("#status_edit").prop( "checked", e.post.status );

                    let teste = e.tags.map(function(e){
                        return e.id;
                    });

                    $('#tags_edit').val(teste);
                    $('#tags_edit').trigger('change');

                    $("#form-edit-modal").attr('action', `/post/${id}`);
                }
            )

        }
    </script>

    <script>
        @if (session('success'))
            Swal.fire(
                "Tudo Certo!",
                "{{ session('success') }}",
                "success"
            )
        @endif

        @if (session('error'))
            Swal.fire(
                "Ops...",
                "{{ session('error') }}",
                "error"
            )
        @endif
    </script>

    <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>

    <script defer>
        $(document).ready(function(){
            $('.select2', '#tags', '#tags_edit').select2({
                theme: "classic"
            });

            CKEDITOR.replace('description', {
                extraPlugins: 'justify',
            });

            CKEDITOR.replace('description_edit', {
                extraPlugins: 'justify',
            })
        });
    </script>
@endsection
