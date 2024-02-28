@extends('adminlte::page')

@section('title', 'Consórcios do Simulador')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Consórcios
            </h3>
            <div class="card-tools">
                @if (auth()->user()->level == 'admin')
                    <button class="btn btn-success" data-toggle="modal" data-target="#addConsorcioModal" type="button">Criar Consórcio</button>
                    @include('admin.consorcios.consorcios.addModal')
                @endif
            </div>
        </div>
        <div class="card-body">
            <div>
                <h6>Filtros:</h6>
                <form action="{{ route('consorcio.index') }}">
                    <div class="row d-flex align-items-end justify-content-center">
                        <div class="col-md-2">
                            <label for="administradora">Administradora</label>
                            <select class="form-control select2" name="administradora" id="administradora">
                                <option value="">Selecione uma administradora</option>
                                @forelse ($administradoras as $administradora)
                                    <option value="{{ $administradora->id }}">{{ $administradora->administradora }}</option>
                                @empty
                                    <option value="">Nenhuma administradora cadastrada</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="grupo">Grupo</label>
                            <select class="form-control select2" name="grupo" id="grupo">
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="cota">Cota</label>
                            <input type="text" name="cota" id="cota" class="form-control">
                        </div>

                        @if (auth()->user()->level != 'seller')
                            <div class="col-md-2">
                                <label for="seller">Responsável</label>
                                <select name="seller" id="seller" class="form-control select2 ">
                                    <option value="">Selecione um vendedor</option>
                                    @forelse ($users as $user)
                                        @if ($user->level == 'seller')
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        @endif
                        <button class="btn-sm btn-success" style="height: 40px !important;">Consultar</button>
                    </div>
                </form>
            </div>
            <table class="table">
                <thead>
                    <th>Consultor</th>
                    <th>Cliente</th>
                    <th>Administradora</th>
                    <th>Grupo</th>
                    <th>Cota</th>
                    <th>Status</th>
                    <th>Crédito</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @forelse ($consorcios as $consorcio)
                        <tr>
                            <td>{{ $consorcio->consultor()->first()->name }}</td>
                            <td>{{ $consorcio->cliente }}</td>
                            <td>{{ $consorcio->administradora()->first()->administradora }}</td>
                            <td>{{ $consorcio->grupo()->first()->grupo }}</td>
                            <td>{{ $consorcio->cota }}</td>
                            <td>{{ $consorcio->status }}</td>
                            <td>R$ {{ number_format($consorcio->credito, 2, ",", ".") }}</td>
                            <td>
                                @if (auth()->user()->level == 'admin')
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{ $consorcio->id }}">Editar</button>
                                    <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#dropModal-{{ $consorcio->id }}">Apagar</button>
                                    @include('admin.consorcios.consorcios.dropModal')
                                    @include('admin.consorcios.consorcios.editModal')
                                @endif

                                @if (auth()->user()->level == 'seller')
                                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal-{{ $consorcio->id }}">Ofertar Lance</button>
                                    @include('admin.consorcios.lances.addModal')
                                @endif

                                <a id="historico" href="{{ route('view.history', [$consorcio->administradora, $consorcio->grupo, $consorcio->cota]) }}">
                                    <button type="button" class="btn btn-primary btn-historico">Histórico</button>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="7" class="text-center">Nenhum consórcio cadastrado</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $consorcios->links() }}
        </div>
    </div>
@endsection
@section('js')
    @include('admin.lances.includes.functions')
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
