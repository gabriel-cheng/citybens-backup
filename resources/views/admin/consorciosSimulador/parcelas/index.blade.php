@extends('adminlte::page')

@section('title', 'Parcelas do Consórcio')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('simulador.index') }}">
                    <button class="btn-sm btn-secondary">Voltar</button>
                </a>
                Parcelas do consórcio #{{ $consorcio->id }}
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Novo</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Parcelas</th>
                        <th>Valor da Parcela</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($parcelas as $parcela)
                        <tr>
                            <td>{{ $parcela->parcelas }} Meses</td>
                            <td>R${{ number_format($parcela->valor_parcela, '2', ',', '.') }}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#editModal-{{ $parcela->id }}" class="btn btn-warning text-white">Editar</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#dropModal-{{ $parcela->id }}" type="button">Deletar</button>
                            </td>
                        </tr>
                        @include('admin.consorcios.parcelas.includes.dropModal')
                        @include('admin.consorcios.parcelas.includes.editModal')
                    @empty
                        <td colspan="6">Nenhuma parcela cadastrada</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $parcelas->links() }}
            @include('admin.consorcios.parcelas.includes.addModal')
        </div>
    </div>
@endsection
