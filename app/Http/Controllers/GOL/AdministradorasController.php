<?php

namespace App\Http\Controllers\GOL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administradoras;
use App\Http\Requests\GOL\Administradoras\StoreAdministradoraRequest;

class AdministradorasController extends Controller
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

    public function index(){
        $administradoras = Administradoras::paginate(10);

        return view('admin.administadoras.index', compact('administradoras'));
    }

    public function store(StoreAdministradoraRequest $request){
        $attributes = $request->all();
        $administradora = Administradoras::create([
            'administradora'    =>  $attributes['administradora'],
            'dia_assembleia'    =>  $attributes['assembleia'],
            'tipos_lance'       =>  $attributes['tipos_lance'],
        ]);

        if($administradora) {
            return redirect()->back()->with('success', 'Administradora cadastrada com sucesso');
        }

        return redirect()->back()->with('error', 'Houve uma falha ao criar a administradora.');
    }

    public function update(Administradoras $administradora, StoreAdministradoraRequest $request){
        $attributes = $request->all();

        $administradora->administradora = $attributes['administradora'];
        $administradora->dia_assembleia = $attributes['assembleia'];
        $administradora->tipos_lance    = $attributes['tipos_lance'];

        if($administradora->save()) {
            return redirect()->back()->with('success', 'Administradora com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao atualizar a administradora');
    }

    public function delete(Administradoras $administradora){
        if($administradora->delete()) {
            return redirect()->back()->with('success', 'Administradora deletada com sucesso.');
        }
        return redirect()->back()->with('error', 'Falha ao deletar a administradora.');
    }

    public function isValidDate(Administradoras $administradora){
        $today = date('d');
        if ($administradora->dia_assembleia > $today) {
            return true;
        }
        return false;
    }


    public function getGrupos(Administradoras $administradora) {
        return $administradora->grupos()->get();
    }

}
