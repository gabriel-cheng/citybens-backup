<table class="table mt-2">
    <thead>
        <tr class="text-center bg-secondary">
            <th scope="col">Lan. Automático</th>
            <th scope="col">Grp. - Cota</th>
            <th scope="col">Cliente</th>
            <th scope="col">Administradora</th>
            <th scope="col">Crédito</th>
            <th scope="col">Lance</th>
            <th scope="col">Lan. Fixo</th>
            <th scope="col">Lan. Emb.</th>
            <th scope="col">Lan. Prop.</th>
            <th scope="col">Cart. Avali.</th>
            <th scope="col">Lan. Quit.</th>
            @if ( auth()->user()->level != "seller") <th scope="col">Vendedor</th> @endif
            <th scope="col">Criado em</th>
            <th>Status</th>
            @if (auth()->user()->level == "admin" || auth()->user()->level == "coordinator")
                <th>Ações</th>
            @else
                <th>-</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($lances as $lance)
            <tr class="text-center @if( $lance->status == "cancelado") bg-secondary @endif">
                <td>{{ $lance->is_automatic ? "Sim" : "Não" }}</td>
                <td>{{ \App\Models\Grupos::where('id', $lance->grupo)->first()->grupo  }} - {{ $lance->cota }}</td>
                <td>{{ $lance->cliente }}</td>
                <td>{{ \App\Models\Administradoras::where('id', $lance->administradora)->first()->administradora }}</td>
                <td>R$ {{ number_format($lance->credito, "2", ",", ".") }}</td>
                <td>R$ {{ $lance->valor_lance_total }} | {{ number_format($lance->porcentagem_lance, 2, ',', '.') }}%</td>
                <td>R$ {{ number_format($lance->valor_lance_fixo, "2", ",", ".") }} | {{ number_format(($lance->valor_lance_fixo), 2, ',', '.') }}% </td>
                <td>R$ {{ number_format($lance->valor_lance_embutido, "2", ",", ".") }} | {{ number_format(($lance->valor_lance_embutido), 2, ',', '.') }}% </td>
                <td>R$ {{ number_format($lance->valor_lance_proprio, "2", ",", ".") }} | {{  number_format(($lance->valor_lance_proprio), 2, ',', '.') }}%</td>
                <td>R$ {{ number_format($lance->carta_avaliacao, "2", ",", ".") }} | {{ number_format((($lance->carta_avaliacao * 100) / $lance->credito), 2, ',', '.') }}% </td>
                <td>{{ $lance->quitacao_grupo ? "Sim" : "Não"}}</td>
                @if ( auth()->user()->level != "seller") <td>{{ \App\Models\User::where('id', $lance->created_by)->first()->name }}</td> @endif
                <td>{{ date('d/m/Y', strtotime($lance->created_at) ) }}</td>
                <td>
                    @if ($lance->status == 'Lance criado')
                        Lance Ofertado
                    @elseif ($lance->status == "cancelado")
                        Lance Rejeitado
                    @else
                        {{ $lance->status}}
                    @endif
                </td>
                @if (auth()->user()->level == 'coordinator' && $lance->status == "Lance Criado")
                    <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#aproveModal-{{ $lance->id }}" type="button">Aprovar</button>
                        <button class="btn btn-danger"  data-toggle="modal" data-target="#rejectModal-{{ $lance->id }}" type="button">Rejeitar</button>
                    </td>
                @elseif ((auth()->user()->level == "admin" && $lance->status != 'finalizado') || auth()->user()->level == 'seller' && $lance->status == 'cancelado')
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit-{{ $lance->id }}"   type="button">Editar</button>
                        @if(auth()->user()->level == 'admin')
                            <button class="btn btn-success" data-toggle="modal" data-target="#endModal-{{ $lance->id }}" type="button">Finalizar</button>
                            @include('admin.lances.includes.actions.end')
                        @endif
                    </td>
                @else
                    <th>-</th>
                @endif
            </tr>
            @if (auth()->user()->level == 'seller' || auth()->user()->level == 'admin')
                @include('admin.lances.includes.editModal')
            @endif

            @if (auth()->user()->level == 'coordinator')
                @include('admin.lances.includes.actions.aprove')
                @include('admin.lances.includes.actions.reject')
            @endif
        @empty
            <td class="text-center" colspan="13">Nenhum lance cadastrado</td>
        @endforelse
    </tbody>
</table>
