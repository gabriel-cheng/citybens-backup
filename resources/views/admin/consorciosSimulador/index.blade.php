@extends('adminlte::page')

@section('title', 'Consórcios do Simulador')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Consórcios Visiveis no simulador
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Novo</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Administradora</th>
                        <th>Crédito</th>
                        <th>Taxa Admin.</th>
                        <th>Bem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($consorcios as $consorcio)
                        <tr>
                            <td>{{ $consorcio->administradora->administradora }}</td>
                            <td>{{ number_format($consorcio->credito, "2", ",", ".") }}</td>
                            <td>{{ $consorcio->taxa_administracao }}%</td>
                            <td>{{ $consorcio->bem }}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#editModal-{{ $consorcio->id }}" class="btn btn-warning text-white">Editar</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#dropModal-{{ $consorcio->id }}" type="button">Deletar</button>
                                <a href="{{ route('simulador.show', $consorcio->id) }}"><button class="btn btn-primary" type="button">Visualizar Parcelas</button></a>
                            </td>
                        </tr>
                        @include('admin.consorcios.includes.editModal')
                        @include('admin.consorcios.includes.dropModal')
                    @empty
                        <td colspan="6">Nenhum consórcio cadastrado</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @include('admin.consorcios.includes.addModal')
            {{ $consorcios->links() }}
        </div>
    </div>
@endsection
