<?php

namespace App\Http\Controllers\GOL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CoordenadoresController extends Controller
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
        $coordenadores  =   User::where('level', 'coordinator')->paginate(10);
        $vendedores     =   User::where('level', 'seller')->get();

        return view('admin.coordenadores.index', compact('coordenadores', 'vendedores'));
    }

    public function store(Request $request){
        $attributes = $request->all();
        if ( is_array($attributes['coordenadores']) ) {
            foreach ($attributes['coordenadores'] as $coordenador) {
                $user = User::find($coordenador);
                $user->level = 'coordinator';
                $user->save();
            }
        } else {
            $user = User::find($attributes['coordenadores']);
            $user->level = 'coordinator';
            $user->save();
        }

        return redirect()->back()->with('success', 'Coordenadores adicionados com sucesso!');
    }

    public function update(User $user, Request $request){
        $attributes = $request->all();

        if ( is_array($attributes['vendedores']) ) {
            foreach ($attributes['vendedores'] as $coordenador) {
                $vendedor = User::find($coordenador);
                $vendedor->coordinator_id = $user->id;
                $vendedor->save();
            }
        } else {
            $vendedor = User::find($attributes['vendedores']);
            $vendedor->coordinator_id = $user->id;
            $vendedor->save();
        }

        return redirect()->back()->with('success', 'Todos vendedores adicionados ao coordenador');
    }

    public function drop(User $user){
        $user->level = "seller";

        if ($user->save()) {
            return redirect()->back()->with('success', 'O usuário voltou a ter acesso de vendedor.');
        }
        return redirect()->back()->with('error', 'Falha ao trocar nível de acesso do usuário.');
    }
}
