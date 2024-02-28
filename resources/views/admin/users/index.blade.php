@extends('adminlte::page')

@section('title', 'Usuários')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Gerenciador de Usuários
            </h3>
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead>
                    <th>Usuário</th>
                    <th>Email</th>
                    <th>Nível</th>
                    <th>Responsável</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->level == 'seller')
                                    Vendedor
                                @elseif ($user->level == 'coordinator')
                                    Coordenador

                                @elseif ($user->level == 'marketing')
                                    Marketing
                                @endif
                            </td>
                            <td>{{ $user->coordinator()->first()->name ?? '-' }}</td>
                            <td>
                                <button type="button"  data-toggle="modal" data-target="#editModal-{{ $user->id }}" class="btn btn-warning">Editar Nível</button>
                                <button type="button"  data-toggle="modal" data-target="#dropModal-{{ $user->id }}" class="btn btn-danger">Apagar</button>
                                {{--@if ($user->level == 'seller')
                                    <button class="btn btn-success">Ver Gols</button>
                                @else
                                    <button class="btn btn-primary">Vendedores</button>
                                @endif--}}
                            </td>
                        </tr>
                        @include('admin.users.includes.dropModal')
                        @include('admin.users.includes.editModal')
                    @empty
                        <td colspan="5">Nenhum usuário listado</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
@stop

@section('js')
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

    <script>
        @if ( count($errors) )
            $("#editModal-{{ old('id') }}").modal('show');
        @endif
    </script>
@endsection
