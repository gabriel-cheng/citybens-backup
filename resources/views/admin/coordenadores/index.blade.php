@extends('adminlte::page')

@section('title', 'Coordenadores')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h2 class="card-title">Coordenadores</h2>
                        <button class="btn btn-success" data-toggle="modal" data-target="#addModal" type="button">Criar</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Coordenador</th>
                                <th scope="col">Email</th>
                                <th scope="col">Quant. Vendedores</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($coordenadores as $coordenador)
                                <tr class="text-center">
                                    <td>{{ $coordenador->name }}</td>
                                    <td>{{ $coordenador->email }}</td>
                                    <td>{{ count($coordenador->sellers()->get()) }}</td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#showModal-{{ $coordenador->id }}" class="btn btn-warning text-white">Editar</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $coordenador->id }}" type="button">Tornar Vendedor</button>
                                    </td>
                                </tr>
                                @include('admin.coordenadores.includes.deleteModal')
                                @include('admin.coordenadores.includes.showModal')
                            @empty
                                <td class="text-center" colspan="4">Nenhuma Administradora cadastrada</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $coordenadores->links() }}
                    @include('admin.coordenadores.includes.addModal')
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $( document ).ready(function() {
            $('#coordenadores, #vendedores').select2({
                theme: "classic",
                width: 'resolve'
            });
        });
        $(document).ready(function(){

        });
    </script>
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
