@extends('adminlte::page')

@section('title', 'Grupos')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Grupos</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Novo</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Grupo</th>
                    <th>Crédito</th>
                    <th>Bem</th>
                    <th>Administradora</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @forelse ($grupos as $grupo)
                        <tr>
                            <td>{{ $grupo->grupo }}</td>
                            <td>{{ number_format($grupo->credito, 2, ",", " ") }}</td>
                            <td>{{ $grupo->bem }}</td>
                            <td>{{ $grupo->administradora->administradora }}</td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{ $grupo->id }}">Editar</button>
                                <button class="btn btn-danger"  data-toggle="modal" data-target="#dropModal-{{ $grupo->id }}">Apagar</button>
                                <a href="{{ route('lances.fixos.index', $grupo->id) }}">
                                    <button class="btn btn-primary">Lances Fixos</button>
                                </a>
                            </td>
                        </tr>
                        @include('admin.grupos.includes.editModal')
                        @include('admin.grupos.includes.dropModal')
                    @empty
                        <td colspan="5" class="text-center">Nenhum Grupo Cadastrado</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $grupos->links() }}
            @include('admin.grupos.includes.addModal')
        </div>
    </div>
@stop

@section('js')
    <script>
        @if(count($errors))
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
