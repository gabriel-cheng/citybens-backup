<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Lances;

class CreateAutomaticLances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create_lances';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will create automatic lances';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $FirstDayLastMonth  =   date('Y-m-01 H:m:s', strtotime('-1 month'));
        $LastDayLastMonth   =   date('Y-m-t H:m:s', strtotime('-1 month'));
        $lances =   Lances::where('created_at', '>=', $FirstDayLastMonth)->where('created_at', '<=', $LastDayLastMonth)->where('is_automatic', true)->get();

        foreach ($lances as $lance) {
            $newLance = Lances::create([
                'grupo'                         =>  $lance->grupo,
                'cota'                          =>  $lance->cota,
                'credito'                       =>  $lance->credito,
                'porcentagem_lance'             =>  $lance->porcentagem_lance,
                'valor_lance_total'             =>  $lance->valor_lance_total,
                'porcentagem_lance_embutido'    =>  $lance->porcentagem_lance_embutido,
                'valor_lance_embutido'          =>  $lance->valor_lance_embutido,
                'porcentagem_lance_proprio'     =>  $lance->porcentagem_lance_proprio,
                'valor_lance_proprio'           =>  $lance->valor_lance_proprio,
                'created_by'                    =>  $lance->created_by,
                'status'                        =>  'Lance Criado',
                'administradora'                =>  $lance->administradora,
                'cliente'                       =>  $lance->cliente,
                'quitacao_grupo'                =>  $lance->quitacao_grupo,
                'carta_avaliacao'               =>  $lance->carta_avaliacao,
                'embutido'                      =>  $lance->embutido,
                'porcentagem_lance_fixo'        =>  $lance->porcentagem_lance_fixo,
                'valor_lance_fixo'              =>  $lance->valor_lance_fixo,
                'is_automatic'                  =>  1,
            ]);
        }
        return 0;
    }
}
