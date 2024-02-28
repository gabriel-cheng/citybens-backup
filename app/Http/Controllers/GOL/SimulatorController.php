<?php

namespace App\Http\Controllers\GOL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConsorciosSimulador;
use App\Models\ParcelasConsorcios;
use Illuminate\Support\Facades\DB;
use App\Mail\LeadSimulador;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SimulatorController extends Controller
{
    public function getValuesByType(Request $request) {
        $attributes =   $request->all();

        $type   =   $attributes['bem'];

        switch ($type) {
            case 'auto':
                $consorcios =   ConsorciosSimulador::where('bem', 'Automovel')->orderBy('credito')->get();
                break;

            case 'imovel':
                $consorcios =   ConsorciosSimulador::where('bem', 'imovel')->orderBy('credito')->get();
                break;

            case 'servicos':
                $consorcios =   ConsorciosSimulador::where('bem', 'servicos')->orderBy('credito')->get();
                break;

            case 'moto':
                $consorcios =   ConsorciosSimulador::where('bem', 'moto')->orderBy('credito')->get();
                break;

            case 'eletro':
                $consorcios =   ConsorciosSimulador::where('bem', 'Eletroeletrônicos')->orderBy('credito')->get();
                break;

            case 'pesado':
                $consorcios =   ConsorciosSimulador::where('bem', 'Pesados')->orderBy('credito')->get();
                break;
            default:
                $consorcios =   false;
                break;
        }

        if ($consorcios) {
            $menorBem       =   $consorcios->first()->credito;
            $menorParcela   =   $consorcios->first()->parcelas()->orderBy('valor_parcela')->first()->valor_parcela;
            $maiorBem       =   $consorcios->last()->credito;
            $maiorParcela   =   $consorcios->last()->parcelas()->orderBy('valor_parcela')->get()->last()->valor_parcela;
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Não foi possível encontrar nenhum consórcio desse tipo.'
            ]);
        }

        return response()->json([
            'status'    =>  true,
            'data'      =>  [
                'smaaler'                   =>  $menorBem,
                'largest'                   =>  $maiorBem,
                'samallestInstallament'     =>  $menorParcela,
                'biggestInstallament'       =>  $maiorParcela,
            ],
        ]);
    }

    public function getConsorcios(Request $request) {
        $attributes =   $request->all();

        $type   =   $attributes['bem'];

        if ($attributes['valor_bem']??false) {
            $value  =   $attributes['valor_bem'];

            switch ($type) {
                case 'auto':
                    $consorcios =   ConsorciosSimulador::where('bem', 'Automovel')->where('credito', '>=', ($attributes['valor_bem'] - 8000))->where('credito', '<=', ($attributes['valor_bem'] + 8000))->orderBy('credito')->with(['parcelas', 'administradora'])->get();
                    break;

                case 'imovel':
                    $consorcios =   ConsorciosSimulador::where('bem', 'imovel')->where('credito', '>=', ($attributes['valor_bem'] - 8000))->where('credito', '<=', ($attributes['valor_bem'] + 8000))->orderBy('credito')->with(['parcelas', 'administradora'])->get();
                    break;

                case 'servicos':
                    $consorcios =   ConsorciosSimulador::where('bem', 'servicos')->where('credito', '>=', ($attributes['valor_bem'] - 8000))->where('credito', '<=', ($attributes['valor_bem'] + 8000))->orderBy('credito')->with(['parcelas', 'administradora'])->get();
                    break;

                case 'moto':
                    $consorcios =   ConsorciosSimulador::where('bem', 'moto')->where('credito', '>=', ($attributes['valor_bem'] - 8000))->where('credito', '<=', ($attributes['valor_bem'] + 8000))->orderBy('credito')->with(['parcelas', 'administradora'])->get();
                    break;

                case 'eletro':
                    $consorcios =   ConsorciosSimulador::where('bem', 'Eletroeletrônicos')->where('credito', '>=', ($attributes['valor_bem'] - 8000))->where('credito', '<=', ($attributes['valor_bem'] + 8000))->orderBy('credito')->with(['parcelas', 'administradora'])->get();
                    break;

                case 'pesado':
                    $consorcios =   ConsorciosSimulador::where('bem', 'Pesados')->where('credito', '>=', ($attributes['valor_bem'] - 8000))->where('credito', '<=', ($attributes['valor_bem'] + 8000))->orderBy('credito')->with(['parcelas', 'administradora'])->get();
                    break;
                default:
                    $consorcios =   false;
                    break;
            }
        } else {
            $value  =   $attributes['valor_parcela'];

            switch ($type) {
                case 'auto':
                    $consorcios =   DB::select('select consorcios_simulator.credito, consorcios_simulator.bem,
                                consorcios_parcelas.parcelas, consorcios_parcelas.valor_parcela
                                from consorcios_parcelas
                                inner join consorcios_simulator
                                on consorcios_simulator.id = consorcios_parcelas.consorcio_simulator_id
                                where consorcios_simulator.bem = "Automovel"
                                and consorcios_parcelas.valor_parcela <= :valueUpper
                                and consorcios_parcelas.valor_parcela >= :valueLatest order by consorcios_parcelas.valor_parcela
                                limit 3',
                                    [
                                        'valueUpper'    =>  ($value + 300),
                                        'valueLatest'   =>  ($value - 300)
                                    ]);
                    break;

                case 'imovel':
                    $consorcios =   DB::select('select consorcios_simulator.credito, consorcios_simulator.bem,
                                consorcios_parcelas.parcelas, consorcios_parcelas.valor_parcela
                                from consorcios_parcelas
                                inner join consorcios_simulator
                                on consorcios_simulator.id = consorcios_parcelas.consorcio_simulator_id
                                where consorcios_simulator.bem = "imovel"
                                and consorcios_parcelas.valor_parcela <= :valueUpper
                                and consorcios_parcelas.valor_parcela >= :valueLatest order by consorcios_parcelas.valor_parcela
                                limit 3',
                                [
                                    'valueUpper'    =>  ($value + 300),
                                    'valueLatest'   =>  ($value - 300)
                                ]);
                    break;

                case 'servicos':
                    $consorcios =   DB::select('select consorcios_simulator.credito, consorcios_simulator.bem,
                                consorcios_parcelas.parcelas, consorcios_parcelas.valor_parcela
                                from consorcios_parcelas
                                inner join consorcios_simulator
                                on consorcios_simulator.id = consorcios_parcelas.consorcio_simulator_id
                                where consorcios_simulator.bem = "servicos"
                                and consorcios_parcelas.valor_parcela <= :valueUpper
                                and consorcios_parcelas.valor_parcela >= :valueLatest order by consorcios_parcelas.valor_parcela
                                limit 3',
                                [
                                    'valueUpper'    =>  ($value + 300),
                                    'valueLatest'   =>  ($value - 300)
                                ]);
                    break;

                case 'moto':
                    $consorcios =   DB::select('select consorcios_simulator.credito, consorcios_simulator.bem,
                                consorcios_parcelas.parcelas, consorcios_parcelas.valor_parcela
                                from consorcios_parcelas
                                inner join consorcios_simulator
                                on consorcios_simulator.id = consorcios_parcelas.consorcio_simulator_id
                                where consorcios_simulator.bem = "moto"
                                and consorcios_parcelas.valor_parcela <= :valueUpper
                                and consorcios_parcelas.valor_parcela >= :valueLatest order by consorcios_parcelas.valor_parcela
                                limit 3',
                                [
                                    'valueUpper'    =>  ($value + 300),
                                    'valueLatest'   =>  ($value - 300)
                                ]);
                    break;

                case 'eletro':
                    $consorcios =   DB::select('select consorcios_simulator.credito, consorcios_simulator.bem,
                                consorcios_parcelas.parcelas, consorcios_parcelas.valor_parcela
                                from consorcios_parcelas
                                inner join consorcios_simulator
                                on consorcios_simulator.id = consorcios_parcelas.consorcio_simulator_id
                                where consorcios_simulator.bem = "Eletroeletrônicos"
                                and consorcios_parcelas.valor_parcela <= :valueUpper
                                and consorcios_parcelas.valor_parcela >= :valueLatest order by consorcios_parcelas.valor_parcela
                                limit 3',
                                [
                                    'valueUpper'    =>  ($value + 300),
                                    'valueLatest'   =>  ($value - 300)
                                ]);
                    break;

                case 'pesado':
                    $consorcios =   DB::select('select consorcios_simulator.credito, consorcios_simulator.bem,
                                consorcios_parcelas.parcelas, consorcios_parcelas.valor_parcela
                                from consorcios_parcelas
                                inner join consorcios_simulator
                                on consorcios_simulator.id = consorcios_parcelas.consorcio_simulator_id
                                where consorcios_simulator.bem = "Pesados"
                                and consorcios_parcelas.valor_parcela <= :valueUpper
                                and consorcios_parcelas.valor_parcela >= :valueLatest order by consorcios_parcelas.valor_parcela
                                limit 3',
                                [
                                    'valueUpper'    =>  ($value + 300),
                                    'valueLatest'   =>  ($value - 300)
                                ]);
                    break;

                default:
                    $consorcios =   false;
                    break;
            }
        }

        if ($consorcios) {
            return response()->json([
                'status'    =>  true,
                'data'      =>  $consorcios
            ]);
        }
        return response()->json([
            'status'    =>  false,
            'message'   =>  'Nenhum consórcio foi encontrado nessa faixa de preço.',
        ]);

    }

    public function storeLead(Request $request) {
        $attributes =   $request->all();

        try {
            Mail::to(config('services.email_envia_simulador'))->send(new LeadSimulador($attributes));

        } catch (\Throwable $th) {
            Log::error("Erro ao enviar email do simulador ".$th);

            return redirect()->back()->with('error', 'Algo deu errado, tente novamente em breve.');
        }

        return redirect()->back()->with('success', 'Logo logo um de nossos colaboradores entrará em contato.');
    }
}
