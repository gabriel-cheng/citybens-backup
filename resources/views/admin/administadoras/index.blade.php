@extends('adminlte::page')

@section('title', 'Administradoras')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h2 class="card-title">Administradoras</h2>
                        <button class="btn btn-success" data-toggle="modal" data-target="#addModal" type="button">Criar</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Administradora</th>
                                <th scope="col">Data da Assembleia</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($administradoras as $administradora)
                                <tr class="text-center">
                                    <td>{{ $administradora->administradora }}</td>
                                    <td>{{ $administradora->dia_assembleia }}</td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#showModal-{{ $administradora->id }}" class="btn btn-warning text-white">Editar</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $administradora->id }}" type="button">Deletar</button>
                                    </td>
                                </tr>
                                @include('admin.administadoras.includes.deleteModal')
                                @include('admin.administadoras.includes.showModal')
                            @empty
                                <td class="text-center" colspan="4">Nenhuma Administradora cadastrada</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $administradoras->links() }}
                    @include('admin.administadoras.includes.addModal')
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
