@extends('adminlte::page')

@section('title', 'Tags')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h2 class="card-title">Tags</h2>
                <button class="btn btn-success" data-toggle="modal" data-target="#addModal" type="button">Criar</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>TAG</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                        <tr>
                            <td style="justify-content: center; display: flex;">
                                <p style="width: 30%; color: {{ $tag->text_color }}; background-color: {{ $tag->background_color }}">{{ $tag->name }}</p>
                            </td>
                            <td>
                                <button class="btn btn-danger"  data-toggle="modal" data-target="#dropModal-{{ $tag->id }}" type="button">Deletar</button>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{ $tag->id }}" type="button">Alterar</button>
                            </td>
                        </tr>
                        @include('admin.tags.includes.editModal')
                        @include('admin.tags.includes.deleteModal')
                    @empty
                        <td colspan="2" class="text-center">Nenhuma Tag cadastrada</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $tags->links() }}
            @include('admin.tags.includes.addModal')
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
@endsection
