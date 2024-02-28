@extends('adminlte::page')

@section('title', 'Grupos')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('grupos.index') }}"><button class="btn-sm btn-secondary">Voltar</button></a>
                Lances Fixos Do Grupo {{ $grupo->grupo ?? ''}} - {{ $grupo->administradora->administradora }}</h3>
            <div class="card-tools">
                <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Novo</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Crédito</th>
                    <th>Lance (%)</th>
                    <th>Lance Valor (R$)</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @forelse ($lances_fixos as $lance)
                        <tr>
                            <td>{{ number_format($grupo->credito, '2', ',', '.') }}</td>
                            <td>{{ $lance->lance_percentual }}</td>
                            <td>{{ number_format($lance->lance_valor, '2', ',', '.') }}</td>
                            <td>
                                <button class="btn btn-warning"data-toggle="modal" data-target="#editModal-{{ $lance->id }}">Editar</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#dropModal-{{ $lance->id }}">Excluir</button>
                            </td>
                        </tr>
                        @include('admin.lancesFixos.includes.editModal')
                        @include('admin.lancesFixos.includes.dropModal')
                    @empty
                        <td class="text-center" colspan="4">Nenhum Lance Fixo Criado</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @include('admin.lancesFixos.includes.addModal')
        </div>
    </div>
@endsection

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
