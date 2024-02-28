<?php

namespace App\Http\Controllers\GOL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConsorciosSimulador;
use App\Models\Administradoras;
use App\Services\Cleaners\Cleaner;
use App\Models\ParcelasConsorcios;


class ConsorciosSimuladorController extends Controller
{
    public function index() {
        $consorcios =   ConsorciosSimulador::orderBy('bem')->paginate();
        $administradoras    =   Administradoras::all();

        return view('admin.consorciosSimulador.index', compact('consorcios', 'administradoras'));
    }

    public function store(Request $request) {
        $attributes =   $request->all();

        $attributes['credito']        =   (new Cleaner)->removeNotNumbers($attributes['credito']) / 100;

        $consorcio  =   ConsorciosSimulador::create($attributes);

        if ($consorcio) {
            return redirect()->back()->with('success', 'Consórcio do simulador criado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao editar consórcio');
    }

    public function update(Request $request, ConsorciosSimulador $consorcio) {
        $attributes =   $request->all();

        $attributes['credito']        =   (new Cleaner)->removeNotNumbers($attributes['credito']) / 100;

        $consorcio->update($attributes);
        $consorcio->touch();
        if ($consorcio->save()) {
            return redirect()->back()->with('success', 'Consórcio atualizado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao atualizar consórcio');
    }

    public function delete(ConsorciosSimulador $consorcio) {
        if ($consorcio->delete()) {
            return redirect()->back()->with('success',  'Consórcio apagado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao apagar o consórcio');
    }

    public function indexParcelas(ConsorciosSimulador $consorcio) {
        $parcelas = $consorcio->parcelas()->paginate();

        return view('admin.consorciosSimulador.parcelas.index', compact('parcelas', 'consorcio'));
    }

    public function storeParcelas(Request $request) {
        $attributes =   $request->all();
        $attributes['valor_parcela']        =   (new Cleaner)->removeNotNumbers($attributes['valor_parcela']) / 100;

        $parcela    =   ParcelasConsorcios::create($attributes);

        if ($parcela) {
            return redirect()->back()->with('success', 'Parcela Criada com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao criar a parcela');
    }

    public function editParcela(Request $request, ParcelasConsorcios $parcela) {
        $attributes =   $request->all();
        $attributes['valor_parcela']        =   (new Cleaner)->removeNotNumbers($attributes['valor_parcela']) / 100;

        $parcela->update($attributes);

        if ($parcela->save()) {
            return redirect()->back()->with('success', 'Parcela atualizada com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao atualizar a parcela');
    }

    public function dropParcela(ParcelasConsorcios $parcela) {
        if ($parcela->delete()) {
            return redirect()->back()->with('success', 'Parcela deletada com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao deletar a parcela');
    }
}
