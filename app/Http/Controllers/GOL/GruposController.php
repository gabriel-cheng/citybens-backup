<?php

namespace App\Http\Controllers\GOL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administradoras;
use App\Models\Grupos;
use App\Services\Cleaners\Cleaner;
use App\Http\Requests\Admin\Grupos\StoreGrupoRequest;

class GruposController extends Controller
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

    public function index() {
        $grupos = Grupos::paginate();
        $administradoras = Administradoras::get();

        return view('admin.grupos.index', compact('grupos', 'administradoras'));
    }

    public function store(StoreGrupoRequest $request) {
        $attributes = $request->all();

        $attributes['credito']  =   (new Cleaner)->removeNotNumbers($attributes['credito']) / 100;

        $validator = Grupos::where('administradora_id', $attributes['administradora_id'])
                     ->where('grupo', $attributes['grupo'])->get();

        if (count($validator) > 0) {
            return redirect()->back()->with('error', 'Esse grupo dessa administradora já está cadastrado!');
        }
        $grupo = Grupos::create($attributes);

        if ($grupo) {
            return redirect()->back()->with('success', 'Grupo Criado Com Sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao criar o grupo');
    }

    public function getGrupo(Grupos $grupo) {
        $grupo->credito =   number_format($grupo->credito, 2, ",", ".");
        $lances =   $grupo->lancesFixos()->get();
        return [
            'grupo'     =>  $grupo,
            'lances'    =>  $lances,
        ];
    }

    public function update(Grupos $grupo, Request $request) {
        $attributes = $request->all();
        $attributes['credito']  =   (new Cleaner)->removeNotNumbers($attributes['credito']) / 100;

        $grupo->update($attributes);

        if ($grupo->save()) {
            return redirect()->back()->with('success', 'Grupo atualizado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao atualizar o grupo');
    }

    public function delete(Grupos $grupo) {
        if ($grupo->delete()) {
            return redirect()->back()->with('success', 'Grupo apagado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao apagar o grupo');
    }
}
