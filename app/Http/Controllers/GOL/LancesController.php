<?php

namespace App\Http\Controllers\GOL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lances;
use App\Models\User;
use App\Models\Administradoras;
use App\Http\Requests\GOL\Lances\StoreLanceRequest;
use App\Services\Cleaners\Cleaner;
use Illuminate\Support\Facades\DB;

class LancesController extends Controller
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

    public function index(Request $request){

        $primeiroDiaDoMes = date('01-m-Y');

        switch (auth()->user()->level) {
            case 'admin':
                $lances = Lances::where('status', '=', 'Lance Confirmado')
                          ->where('created_at', '>=', $primeiroDiaDoMes)
                          ->orderBy('administradora')
                          ->paginate(10);
                break;
            case 'coordinator':
                $lances = DB::table('lances')
                            ->select('lances.grupo', 'lances.created_by', 'lances.is_automatic', 'lances.valor_lance_total', 'lances.cota as cota', 'lances.cliente', 'lances.valor_lance_fixo', 'lances.porcentagem_lance_fixo', 'lances.administradora as administradora', 'lances.credito', 'lances.porcentagem_lance', 'lances.valor_lance_embutido', 'lances.valor_lance_proprio', 'lances.cliente as name', 'lances.id', 'lances.created_at', 'lances.status', 'lances.carta_avaliacao', 'lances.quitacao_grupo')
                            ->join('users', 'users.id', '=', 'lances.created_by')
                            ->where('users.coordinator_id', auth()->user()->id)
                            ->where('lances.created_at', '>=', $primeiroDiaDoMes)
                            ->distinct()
                            ->paginate();

                break;

            case 'seller':
                $lances = Lances::where('status', '<>', 'finalizado')
                    ->where('created_by', auth()->user()->id)->orderBy('administradora')
                    ->where('created_at', '>=', $primeiroDiaDoMes)
                    ->paginate(10);
                break;
            default:
                $lances = Lances::where('status', '<>', 'finalizado')
                    ->where('created_by', auth()->user()->id)->orderBy('administradora')
                    ->paginate(10);
                break;
        }

        $administradoras    =   Administradoras::all();
        $users  =   User::all();

        return view('admin.lances.index', compact('lances', 'administradoras', 'users'));
    }

    public function search(Request $request){
        $lances =   (new Lances)->newQuery();
        if ($request->data_inicio) {
            $lances->where('created_at', '>=', $request->data_inicio);
        }

        if ($request->data_final) {
            $lances->where('created_at', '<=', $request->data_final);

        }

        if ($request->administradora) {
            $lances->where('administradora', $request->administradora);
        }

        if ($request->grupo) {
            $lances->where('grupo', $request->grupo);
        }

        if ($request->cota) {
            $lances->where('cota', $request->cota);
        }

        if ($request->status) {
            $lances->where('status', $request->status);
        }

        if (auth()->user()->level == 'seller') {
            $lances->where('created_by', auth()->user()->id);
        }

        if (auth()->user()->level == 'coordinator') {
            $sellers    =   auth()->user()->sellers()->select('id')->get();
            $sellers_id = [];

            foreach ($sellers as $seller ) {
                array_push($sellers_id, $seller->id);
            }

            $lances->whereIn('created_by', $sellers_id);

            if ($request->seller) {
                $lances->where('created_by', $request->seller);
            }
        }

        if (auth()->user()->level == 'admin') {
            if ($request->seller) {
                $lances->where('created_by', $request->seller);
            }
        }

        $lances =   $lances->paginate();
        $administradoras    =   Administradoras::all();
        $users  =   User::all();

        return view('admin.lances.index', compact('lances', 'administradoras', 'users'));
    }

    public function show(Lances $lance) {
        $lance->credito                 =   number_format($lance->credito, 2, ",", ".");
        $lance->valor_lance_proprio     =   number_format($lance->valor_lance_proprio, 2, ',', '.');
        $lance->carta_avaliacao         =   number_format($lance->carta_avaliacao, 2, ',', '.');

        return $lance;
    }

    public function store(StoreLanceRequest $request){
        $attributes = $request->all();
        $credito        =   (new Cleaner)->removeNotNumbers($attributes['credito']) / 100;
        $lanceFixo      =   $attributes['lance-fixo'];
        $lanceEmbutido  =   $attributes['lance-embutido'] ?? 0   / 100 * $credito;
        $lanceProprio   =   $attributes['lance-proprio']  ?? 0    / 100 * $credito;
        $cartaAvaliacao =   $attributes['carta_avaliacao']??0  / 100 * $credito;
        $lanceTotal     =   $lanceEmbutido + $lanceProprio + $cartaAvaliacao + $lanceFixo;

        $primeiroDiaDoMes = date('Y-m-01');

        $lancesDaCota = Lances::where('grupo', $attributes['grupo'])
                                ->where('cota', $attributes['cota'])
                                ->where('administradora', $attributes['administradora'])
                                ->whereIn('status', ['Lance Criado', 'Lance Confirmado'])
                                ->where('created_at', '>=', $primeiroDiaDoMes)
                                ->get();

        if (count($lancesDaCota) > 0) {
            return redirect()->back()->with('error', 'Já foi cadastrado um lance para essa cota esse mês');
        }

        $lance = Lances::create([
            'grupo'                         =>  $attributes['grupo'],
            'cota'                          =>  $attributes['cota'],
            'credito'                       =>  $credito,
            'porcentagem_lance'             =>  ( ($lanceTotal * 100) / $credito ),
            'valor_lance_total'             =>  $lanceTotal,
            'porcentagem_lance_embutido'    =>  $attributes['lance-embutido'] ?? 0,
            'valor_lance_embutido'          =>  $lanceEmbutido,
            'porcentagem_lance_proprio'     =>  $attributes['lance-proprio'] ?? 0,
            'valor_lance_proprio'           =>  $lanceProprio,
            'created_by'                    =>  $attributes['responsavel'],
            'status'                        =>  'Lance Criado',
            'administradora'                =>  $attributes['administradora'],
            'cliente'                       =>  $attributes['cliente'],
            'quitacao_grupo'                =>  $attributes['quitacao_grupo']??0 == 1 ? true : false,
            'carta_avaliacao'               =>  $cartaAvaliacao,
            'embutido'                      =>  $lanceEmbutido ? true : false,
            'porcentagem_lance_fixo'        =>  ( ($attributes['lance-fixo'] * 100 ) / $credito ),
            'is_automatic'                  =>  $attributes['is_automatic'],
            'valor_lance_fixo'              =>  $lanceFixo,
        ]);

        if ($lance) {
            return redirect()->back()->with('success', 'Lance criado com sucesso');
        }

        return redirect()->back()->with('error', 'Houve uma falha ao cadastrar o lance');
    }

    public function aprove(Lances $lance) {
        $lance->status  =   'Lance Confirmado';

        if ($lance->save()) {
            return redirect()->back()->with('success', 'Lance confirmado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao confimar o lance');
    }

    public function reject(Lances $lance) {
        $lance->status  =   'cancelado';

        if ($lance->save()) {
            return redirect()->back()->with('success', 'Lance rejeitado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao rejeitar o lance');
    }

    public function end(Lances $lance) {
        $lance->status  =   'finalizado';

        if ($lance->save()) {
            return redirect()->back()->with('success', 'Lance finalizado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao finalizar o lance');
    }

    public function update(StoreLanceRequest $request, Lances $lance){
        $attributes = $request->all();

        if ($lance->status == "cancelado") {    // Caso o plano tenha sido rejeitado e o vendedor o atualizou!
            $lance->status = 'Lance Criado';
        }

        $credito        =   (new Cleaner)->removeNotNumbers($attributes['credito']) / 100;
        $lanceFixo      =   $attributes['lance-fixo'];
        $lanceEmbutido  =   $attributes['lance-embutido'] ?? 0   / 100 * $credito;
        $lanceProprio   =   $attributes['lance-proprio'] ?? 0    / 100 * $credito;
        $cartaAvaliacao =   $attributes['carta_avaliacao'] ?? 0  / 100 * $credito;
        $lanceTotal     =   $lanceEmbutido + $lanceProprio + $cartaAvaliacao + $lanceFixo;

        $lance->cliente                       = $attributes['cliente'];
        $lance->grupo                         = $attributes['grupo'];
        $lance->cota                          = $attributes['cota'];
        $lance->credito                       = $credito;
        $lance->porcentagem_lance             = ( ($lanceTotal * 100) / $credito );
        $lance->valor_lance_total             = $lanceTotal;
        $lance->porcentagem_lance_embutido    = $attributes['lance-embutido'] ?? 0;
        $lance->valor_lance_embutido          = $lanceEmbutido;
        $lance->porcentagem_lance_proprio     = $attributes['lance-proprio'] ?? 0;
        $lance->valor_lance_proprio           = $lanceProprio;
        $lance->created_by                    = $attributes['responsavel'];
        $lance->administradora                = $attributes['administradora'];
        $lance->cliente                       = $attributes['cliente'];
        $lance->quitacao_grupo                = $attributes['quitacao_grupo']??0 == 1 ? true : false;
        $lance->carta_avaliacao               = $cartaAvaliacao;
        $lance->porcentagem_lance_fixo        = ( ($attributes['lance-fixo'] * 100 ) / $credito );
        $lance->valor_lance_fixo              = $lanceFixo;
        $lance->is_automatic                  = $attributes['is_automatic'];

        if ($lance->save()) {
            return redirect()->back()->with('success', 'Lance Atualizado com sucesso.');
        }
        return redirect()->back()->with('error', 'Houve uma falha ao atualizar o lance.');
    }

    public function drop(Lances $lance){
        if ($lance->delete()) {
            return redirect()->back()->with('success', 'Lance Excluido com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao excluir o lance');
    }

    public function history($administradora, $grupo, $cota) {
        $lance = Lances::where('administradora', $administradora)->where('grupo', $grupo)->where('cota', $cota)->first();

        if ($lance) {
            return $lance;
        }

        return false;
    }

    public function viewHistory($administradora, $grupo, $cota) {
        $lances = Lances::where('administradora', $administradora)->where('grupo', $grupo)->where('cota', $cota)->paginate();
        $administradoras = Administradoras::all();

        $administradora =   Administradoras::where('id', $administradora)->first();
        $users          =   User::all();
        return view('admin.lances.includes.history', compact('lances', 'administradoras', 'administradora', 'grupo', 'cota', 'users'));
    }
}
