<?php

namespace App\Http\Controllers\GOL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consorcios;
use App\Http\Requests\GOL\Consorcios\StoreConsorcioRequest;
use App\Http\Requests\GOL\Consorcios\UpdateConsorcioRequest;
use App\Services\Cleaners\Cleaner;
use App\Models\Administradoras;
use App\Models\User;

class ConsorciosController extends Controller
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

    public function index(Request $request) {

        $administradoras    =   Administradoras::all();
        $users              =   User::where('level', 'seller')->get();

        $consorcios         =   (new Consorcios)->newQuery();

        if ($request->grupo) {
            $consorcios->where('grupo', $request->grupo);
        }

        if ($request->cota) {
            $consorcios->where('cota', $request->cota);
        }

        if ($request->administradora) {
            $consorcios->where('administradora', $request->administradora);
        }

        if (auth()->user()->level != 'seller' && $request->seller ) {
            $consorcios->where('consultor', $request->seller);
        }

        if (auth()->user()->level == 'seller') {
            $consorcios->where('consultor', auth()->user()->id);
        }

        $consorcios = $consorcios->paginate();

        return view('admin.consorcios.index', compact('administradoras', 'users', 'consorcios'));
    }

    public function store(StoreConsorcioRequest $request) {
        $attributes = $request->all();

        $attributes['credito']      =   (new Cleaner)->removeNotNumbers($attributes['credito']) / 100;
        $attributes['created_by']   =   auth()->user()->id;

        $validador =    Consorcios::where('administradora', $attributes['administradora'])
                        ->where('cota', $attributes['cota'])
                        ->where('grupo', $attributes['grupo'])->first();

        if (isset($validador)) {
            return redirect()->back()->with('error', 'Esse consórcio já foi cadastrado.');
        }

        $consorcio  =   Consorcios::create($attributes);

        if ($consorcio) {
            return redirect()->back()->with('success', 'Consórcio cadastrado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao cadastrar o consórcio');
    }

    public function update(Consorcios $consorcio, UpdateConsorcioRequest $request) {
        $attributes =   $request->all();

        $attributes['credito']      =   (new Cleaner)->removeNotNumbers($attributes['credito']) / 100;

        $validador =    Consorcios::where('administradora', $consorcio->administradora)
            ->where('cota', $attributes['cota'])
            ->where('grupo', $consorcio->grupo)->first();

        if (isset($validador) && $validador->id != $consorcio->id) {
            return redirect()->back()->with('error', 'Esse consórcio já foi cadastrado.');
        }

        if ($consorcio->update($attributes)) {
            $consorcio->touch();
            return redirect()->back()->with('sucess', 'Consórcio atualizado com sucesso.');
        }
        return redirect()->back()->with('error', 'Falha ao atualizar o consórcio.');
    }

    public function delete(Consorcios $consorcio, Request $request) {
        if ($consorcio->delete()) {
            return redirect()->back()->with('success', 'Consórcio deletado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao deletar o consórcio.');
    }

}
