@extends('adminlte::page')

@section('title', 'Histórico de lances')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h2 class="card-title">
                Histórico de lances da(o) {{ $administradora->administradora }}, grupo {{ \App\Models\Grupos::where('id', $grupo)->first()->grupo }} e cota: {{ $cota }}
            </h2>
            <div class="card-tools">
                <a href="{{ route('consorcio.index') }}"><button class="btn btn-secondary text-white">Voltar</button></a>
            </div>
        </div>
        <div class="card-body">
            @include('admin.lances.includes.listTable')
        </div>
        <div class="card-footer">
            @include('admin.lances.includes.showModal')
            @include('admin.lances.includes.addModal')
            {{ $lances->links() }}
        </div>
    </div>
@stop

@section('js')
    @include('admin.lances.includes.functions')
@endsection
