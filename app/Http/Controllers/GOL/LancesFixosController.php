<?php

namespace App\Http\Controllers\GOL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grupos;
use App\Models\LancesFixos;

class LancesFixosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Grupos $grupo) {
        $lances_fixos = $grupo->lancesFixos()->get();

        return view('admin.lancesFixos.index', compact('lances_fixos', 'grupo'));
    }

    public function store(Grupos $grupo, Request $request) {
        $valor_lance =  ($grupo->credito * $request->lance_percentual) / 100.0;
        $lance = LancesFixos::create([
            'grupo_id'          =>  $grupo->id,
            'lance_percentual'  =>  $request->lance_percentual,
            'lance_valor'       =>  $valor_lance,
        ]);

        if ($lance) {
            return redirect()->back()->with('success', 'Lance Fixo Criado com Sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao Criar Lance Fixo');
    }

    public function update(LancesFixos $lance, Request $request){
        $grupo = Grupos::where('id', $lance->grupo_id)->first();

        $valor_lance =  ($grupo->credito * $request->lance_percentual) / 100.0;

        $lance->lance_percentual    =   $request->lance_percentual;
        $lance->lance_valor         =   $valor_lance;

        if ($lance->save()) {
            return redirect()->back()->with('success', 'Lance atualizado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao atualizar o lance');
    }

    public function delete(LancesFixos $lance) {
        if ($lance->delete()) {
            return redirect()->back()->with('success', 'Lance deletado com sucesso.');
        }
        return redirect()->back()->with('error', 'Falha ao deletar lance.');
    }
}
