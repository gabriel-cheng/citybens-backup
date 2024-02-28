@extends('adminlte::page')

@section('title', 'Index de Lances')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h2 class="card-title">Gestão de Oferta de Lances</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <h6>Filtros:</h6>
                        <form action="{{ route('lances.search') }}">
                            <div class="row d-flex align-items-end justify-content-center">
                                <div class="col-md-2">
                                    <label for="data_inicio">Lances criados de</label>
                                    <input type="date" name="data_inicio" id="data_inicio" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label for="data_final">Até</label>
                                    <input type="date" name="data_final" id="data_final" class="form-control">
                                </div>

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
                            </div>
                            <div class="row d-flex align-items-end justify-content-center">
                                <div class="col-md-2">
                                    <label for="grupo">Grupo</label>
                                    <select class="form-control select2" name="grupo" id="grupo">
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="cota">Cota</label>
                                    <input type="text" name="cota" id="cota" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Selecione um status</option>
                                        <option value="Lance Criado">Lance Criado</option>
                                        <option value="Lance Confirmado">Lance Confirmado</option>
                                        <option value="cancelado">Cancelado</option>
                                        @if (auth()->user()->level == 'admin')
                                            <option value="finalizado">Finalizado</option>
                                        @endif
                                    </select>
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
                    @include('admin.lances.includes.listTable')
                </div>
                <div class="card-footer">
                    @include('admin.lances.includes.showModal')
                    {{ $lances->links() }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $('#administradora, #grupo, #cota').blur(function() {
            let administradora = $('#administradora').val();
            let grupo = $('#grupo').val();
            let cota = $('#cota').val();

            if(administradora && grupo && cota) {
                let rota = `/lances/${administradora}/${grupo}/${cota}`;

                $.get(
                    rota,
                    {

                    },
                    function(e) {
                        if (e != false) {
                            let historico = `/lances/${administradora}/${grupo}/${cota}/historico`;
                            $("#historico").attr('href', historico);
                            $("#historico").removeClass('d-none');
                            $("#credito-add").val(e.credito);
                            $("#cliente").val(e.cliente);
                            $("#carta_avaliacao_add").focus();
                        }else {
                            $("#historico").addClass('d-none');
                        }
                    }
                )
            }
        });
    </script>
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
