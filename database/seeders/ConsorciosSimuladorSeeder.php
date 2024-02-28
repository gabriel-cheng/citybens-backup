<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConsorciosSimulador;
use App\Models\ParcelasConsorcios;

class ConsorciosSimuladorSeeder extends Seeder
{

    private const ITAU      =   1;
    private const SANTANTER =   2;
    private const RECON     =   3;
    private const MAGAZINE  =   4;

    private const AUTO      =   'Automovel';
    private const IMOVEL    =   'Imóvel';
    private const SERVICOS  =   'Serviços';
    private const MOTO      =   'Moto';
    private const ELETRO    =   'Eletroeletrônicos';
    private const PESADOS   =   'Pesados';

    private $consorcios_auto = [
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  30000,
            'taxa_administracao'    =>  9,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  1308
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  908.33
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  681.25
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  545.0
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  408.75
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  35000,
            'taxa_administracao'    =>  9,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  1526
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  1059.72
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  794.79
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  635.83
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  476.88
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  42000,
            'taxa_administracao'    =>  15,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  1932
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  1341.67
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  1006.25
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  805
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  603.75
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  55000,
            'taxa_administracao'    =>  15,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  2530
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  1756.94
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  1317.71
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  1054.17
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  790.63
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  40000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  1936
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  1344.44
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  1008.33
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  806.67
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  605
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  45000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  2178
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  1512.50
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  1134.38
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  907.50
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  680,63
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  50000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  2360
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  1638.89
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  1229.17
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  983.33
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  737.5
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  60000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  2832
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  1966.67
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  1475
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  1180
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  885
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  65000,
            'taxa_administracao'    =>  9,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  2834
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  1968.06
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  1476.03
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  1180.83
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  885.63
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  75000,
            'taxa_administracao'    =>  9,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  3270
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  2270.83
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  1703.13
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  1362.5
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  885.3
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  80000,
            'taxa_administracao'    =>  15,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  3680
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  2555.56
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  1916.67
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  1533.33
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  1150.0
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  100000,
            'taxa_administracao'    =>  15,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  4600
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  3194.44
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  2395.83
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  1916.67
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  1437.50
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  100000,
            'taxa_administracao'    =>  15,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  4600
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  3194.44
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  2395.83
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  1916.67
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  1437.50
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  90000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  4356
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  3025.00
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  2268.75
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  1815.00
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  1361.25
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  110000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  5324
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  3697.22
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  2772.92
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  2218.33
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  1663.75
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  120000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  5664.0
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  3933.33
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  2950.00
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  2360.00
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  1770.00
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  130000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::AUTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  6136.0
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  4261.11
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  3195.83
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  2556.67
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  1917.50
                ],
            ],
        ],
    ];

    private $consorcios_imovel  =   [
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  200000,
            'taxa_administracao'    =>  23,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  2460
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  2050
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  1822.22
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  1640.0
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  1366.67
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  1230
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  1025
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  160000,
            'taxa_administracao'    =>  23,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  1968
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  1640
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  1457.78
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  1312.00
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  1093.33
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  984
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  820
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  150000,
            'taxa_administracao'    =>  22,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  1830
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  1525
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  1355.56
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  1220
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  1016.67
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  915
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  762.5
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  170000,
            'taxa_administracao'    =>  22,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  2074
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  1728.33
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  1536.30
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  1382.67
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  1152.22
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  1037
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  864.17
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  190000,
            'taxa_administracao'    =>  23,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  2337
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  1947.5
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  1731.11
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  1558
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  1298.33
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  1168.5
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  973.75
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  230000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  2783
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  2319.17
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  2061.48
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  1855.33
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  1546.11
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  1391.5
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  1159.58
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  250000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  3025
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  2520.83
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  2240.74
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  2016.67
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  1680.56
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  1512.5
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  1260.42
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  140000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  1680
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  1400
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  1244.44
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  1120.0
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  933.33
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  840
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  700
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  185000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  2220
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  1850
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  1644.44
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  1480
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  1233.33
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  1110.00
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  925.00
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  270000,
            'taxa_administracao'    =>  23,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  3321
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  2767.5
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  2460
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  2214
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  1845
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  1660.5
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  1383.75
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  260000,
            'taxa_administracao'    =>  23,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  3198
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  2665
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  2368.89
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  2132
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  1776.76
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  1599
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  1332.5
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  280000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  3388
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  2823.33
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  2509.63
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  2258.67
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  1882.22
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  1694
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  1411.67
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  400000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  4840
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  4033.33
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  3585.19
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  3226.67
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  2688.89
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  2420
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  2016.67
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  500000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  6050
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  5041.67
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  4481.48
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  4033.33
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  3361.11
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  3025
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  2520.83
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  320000,
            'taxa_administracao'    =>  22,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  3904
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  3253.33
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  2891.85
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  2602.67
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  2168.89
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  1952.00
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  1626.67
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  350000,
            'taxa_administracao'    =>  22,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  4270
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  3558.33
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  3162.96
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  2846.67
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  2372.22
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  2135
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  1779.17
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  380000,
            'taxa_administracao'    =>  22,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  4636
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  3863.33
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  3434.07
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  3090.67
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  2575.56
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  2318
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  1931.67
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  500000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  6000
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  5000
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  4444.44
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  4000
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  3333.33
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  3000
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  2500
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  480000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::IMOVEL,
            'parcelas'  =>  [
                [
                    'parcela'   =>  100,
                    'valor'     =>  5760
                ],
                [
                    'parcela'   =>  120,
                    'valor'     =>  4800
                ],
                [
                    'parcela'   =>  135,
                    'valor'     =>  4266.67
                ],
                [
                    'parcela'   =>  150,
                    'valor'     =>  3840
                ],
                [
                    'parcela'   =>  180,
                    'valor'     =>  3200
                ],
                [
                    'parcela'   =>  200,
                    'valor'     =>  2880
                ],
                [
                    'parcela'   =>  240,
                    'valor'     =>  2400
                ],
            ],
        ],
    ];

    private $consorcios_servicos    =   [
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  6000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  283.2
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  196.67
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  168.57
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  147.5
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  141.6
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  8000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  377.6
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  262.22
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  224.76
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  196.67
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  188.8
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  10000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  484
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  336.11
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  288.1
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  252.08
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  242.00
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  11000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  532.4
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  369.72
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  316.9
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  277.29
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  266.20
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  12000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  576
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  400
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  342.86
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  300
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  288
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  15000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  708
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  491.67
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  421.43
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  368.75
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  354
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  16000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  774
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  537.78
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  460.95
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  403.33
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  387.2
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  17000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  822.8
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  571.39
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  489.76
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  428.54
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  411.4
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  18000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  864
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  600
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  514.29
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  450
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  432
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  19000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  896.8
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  622.78
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  533.81
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  467.08
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  448.4
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  20000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  994
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  655.56
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  561.9
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  491.67
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  472
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  25000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  1180
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  819.44
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  792.38
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  614.58
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  590
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  30000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::SERVICOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  25,
                    'valor'     =>  1416
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  983.33
                ],
                [
                    'parcela'   =>  42,
                    'valor'     =>  832.86
                ],
                [
                    'parcela'   =>  48,
                    'valor'     =>  737.5
                ],
                [
                    'parcela'   =>  59,
                    'valor'     =>  708
                ],
            ],
        ],
    ];

    private $consorcios_moto    =   [
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  7000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  458.89
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  330.4
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  275.33
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  205.60
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  165.2
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  137.67
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  114.72
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  103.25
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  9000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  590
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  424.80
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  354
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  265.50
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  212.40
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  177
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  147.5
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  132.75
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  10000,
            'taxa_administracao'    =>  17,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  650
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  468
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  390
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  292.5
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  234
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  195
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  162.5
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  146.25
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  13000,
            'taxa_administracao'    =>  17,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  845
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  608
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  507
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  380.25
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  304.20
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  253.5
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  211.25
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  190.13
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  15000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  983.33
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  708.00
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  590
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  442.5
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  354.0
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  295.00
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  245.83
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  221.25
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  19000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  1245.56
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  896.8
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  747.33
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  560.50
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  448.40
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  373.67
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  311.39
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  280.25
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  22000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  1466.67
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  1056.00
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  880.00
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  660
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  528
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  440
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  366.67
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  330
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  25000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  1666.67
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  1200
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  1000
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  750
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  600
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  500
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  416.67
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  375
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  25000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  1666.67
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  1200
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  1000
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  750
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  600
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  500
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  416.67
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  375
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  26000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  1704.44
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  1227.2
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  1022.67
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  767
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  613.6
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  511.33
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  426.11
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  383.5
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  28000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  1835
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  1321.6
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  1101.33
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  826
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  660.8
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  550.67
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  458.89
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  413
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  30000,
            'taxa_administracao'    =>  17,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  1950
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  1404
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  1170
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  877.5
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  702
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  585
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  487.5
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  438.75
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  33000,
            'taxa_administracao'    =>  17,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  2145
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  1544.4
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  1287
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  965.25
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  772.2
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  643.5
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  536.25
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  482.63
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  36000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  2360
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  1699.2
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  1416
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  1062
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  849.6
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  708.0
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  590
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  531
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  39000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  2556.67
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  1840.8
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  1534
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  1150.5
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  920.4
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  767
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  639.17
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  575.25
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  40000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  2666.67
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  1920
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  1600
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  1200
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  960
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  800
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  666.67
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  600
                ],
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  50000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::MOTO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  18,
                    'valor'     =>  3333.33
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  2400
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  2000
                ],
                [
                    'parcela'   =>  40,
                    'valor'     =>  1500
                ],
                [
                    'parcela'   =>  50,
                    'valor'     =>  1200
                ],
                [
                    'parcela'   =>  60,
                    'valor'     =>  1000
                ],
                [
                    'parcela'   =>  72,
                    'valor'     =>  833.33
                ],
                [
                    'parcela'   =>  80,
                    'valor'     =>  750
                ],
            ],
        ],
    ];

    private $consorcios_eletro  =   [
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  3000,
            'taxa_administracao'    =>  27,
            'bem'                   =>  self::ELETRO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  190.5
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  152.4
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  127
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  105.83
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  3500,
            'taxa_administracao'    =>  27,
            'bem'                   =>  self::ELETRO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  222.25
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  177.8
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  148.17
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  123.47
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  4000,
            'taxa_administracao'    =>  22,
            'bem'                   =>  self::ELETRO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  244
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  195.2
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  162.67
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  135.56
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  6000,
            'taxa_administracao'    =>  22,
            'bem'                   =>  self::ELETRO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  366
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  292.8
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  244.0
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  203.33
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  8000,
            'taxa_administracao'    =>  24,
            'bem'                   =>  self::ELETRO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  496
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  396.8
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  330.67
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  275.56
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  9000,
            'taxa_administracao'    =>  24,
            'bem'                   =>  self::ELETRO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  558
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  446.4
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  372.0
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  310.0
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  11000,
            'taxa_administracao'    =>  26,
            'bem'                   =>  self::ELETRO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  693
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  554
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  462
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  385
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  11000,
            'taxa_administracao'    =>  26,
            'bem'                   =>  self::ELETRO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  693
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  554
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  462
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  385
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  14000,
            'taxa_administracao'    =>  26,
            'bem'                   =>  self::ELETRO,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  882
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  705.6
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  588
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  490
                ]
            ],
        ],
    ];

    private $consorcios_pesado  =   [
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  120000,
            'taxa_administracao'    =>  15,
            'bem'                   =>  self::PESADOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  6900
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  5520
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  4600
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  3833.33
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::RECON,
            'credito'               =>  130000,
            'taxa_administracao'    =>  15,
            'bem'                   =>  self::PESADOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  7475
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  5980
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  4600
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  3833.33
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  150000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::PESADOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  9075
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  7260
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  6050
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  5041.67
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::ITAU,
            'credito'               =>  170000,
            'taxa_administracao'    =>  21,
            'bem'                   =>  self::PESADOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  10285
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  8228
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  6856.67
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  5713.89
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  220000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::PESADOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  12980
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  10385
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  8653.33
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  7211.11
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::MAGAZINE,
            'credito'               =>  250000,
            'taxa_administracao'    =>  18,
            'bem'                   =>  self::PESADOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  14750
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  11800
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  9833.33
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  8194.44
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  275000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::PESADOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  16500
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  13200
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  11000
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  9166.67
                ]
            ],
        ],
        [
            'administradora_id'     =>  self::SANTANTER,
            'credito'               =>  300000,
            'taxa_administracao'    =>  20,
            'bem'                   =>  self::PESADOS,
            'parcelas'  =>  [
                [
                    'parcela'   =>  20,
                    'valor'     =>  18000
                ],
                [
                    'parcela'   =>  25,
                    'valor'     =>  14400
                ],
                [
                    'parcela'   =>  30,
                    'valor'     =>  12000
                ],
                [
                    'parcela'   =>  36,
                    'valor'     =>  10000
                ]
            ],
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->consorcios_auto as $consorcio) {
            $c = ConsorciosSimulador::create([
                'administradora_id'     =>  $consorcio['administradora_id'],
                'credito'               =>  $consorcio['credito'],
                'taxa_administracao'    =>  $consorcio['taxa_administracao'],
                'bem'                   =>  $consorcio['bem'],
            ]);

            foreach ($consorcio['parcelas'] as $parcela) {
                ParcelasConsorcios::create([
                    'consorcio_simulator_id'    =>  $c->id,
                    'parcelas'                  =>  $parcela['parcela'],
                    'valor_parcela'             =>  $parcela['valor'],
                ]);
            }
        }

        foreach ($this->consorcios_imovel as $consorcio) {
            $c = ConsorciosSimulador::create([
                'administradora_id'     =>  $consorcio['administradora_id'],
                'credito'               =>  $consorcio['credito'],
                'taxa_administracao'    =>  $consorcio['taxa_administracao'],
                'bem'                   =>  $consorcio['bem'],
            ]);

            foreach ($consorcio['parcelas'] as $parcela) {
                ParcelasConsorcios::create([
                    'consorcio_simulator_id'    =>  $c->id,
                    'parcelas'                  =>  $parcela['parcela'],
                    'valor_parcela'             =>  $parcela['valor'],
                ]);
            }
        }

        foreach ($this->consorcios_servicos as $consorcio ) {
            $c = ConsorciosSimulador::create([
                'administradora_id'     =>  $consorcio['administradora_id'],
                'credito'               =>  $consorcio['credito'],
                'taxa_administracao'    =>  $consorcio['taxa_administracao'],
                'bem'                   =>  $consorcio['bem'],
            ]);

            foreach ($consorcio['parcelas'] as $parcela) {
                ParcelasConsorcios::create([
                    'consorcio_simulator_id'    =>  $c->id,
                    'parcelas'                  =>  $parcela['parcela'],
                    'valor_parcela'             =>  $parcela['valor'],
                ]);
            }
        }

        foreach ($this->consorcios_moto as $consorcio ) {
            $c = ConsorciosSimulador::create([
                'administradora_id'     =>  $consorcio['administradora_id'],
                'credito'               =>  $consorcio['credito'],
                'taxa_administracao'    =>  $consorcio['taxa_administracao'],
                'bem'                   =>  $consorcio['bem'],
            ]);

            foreach ($consorcio['parcelas'] as $parcela) {
                ParcelasConsorcios::create([
                    'consorcio_simulator_id'    =>  $c->id,
                    'parcelas'                  =>  $parcela['parcela'],
                    'valor_parcela'             =>  $parcela['valor'],
                ]);
            }
        }

        foreach ($this->consorcios_eletro as $consorcio) {
            $c = ConsorciosSimulador::create([
                'administradora_id'     =>  $consorcio['administradora_id'],
                'credito'               =>  $consorcio['credito'],
                'taxa_administracao'    =>  $consorcio['taxa_administracao'],
                'bem'                   =>  $consorcio['bem'],
            ]);

            foreach ($consorcio['parcelas'] as $parcela) {
                ParcelasConsorcios::create([
                    'consorcio_simulator_id'    =>  $c->id,
                    'parcelas'                  =>  $parcela['parcela'],
                    'valor_parcela'             =>  $parcela['valor'],
                ]);
            }
        }

        foreach ($this->consorcios_pesado as $consorcio) {
            $c = ConsorciosSimulador::create([
                'administradora_id'     =>  $consorcio['administradora_id'],
                'credito'               =>  $consorcio['credito'],
                'taxa_administracao'    =>  $consorcio['taxa_administracao'],
                'bem'                   =>  $consorcio['bem'],
            ]);

            foreach ($consorcio['parcelas'] as $parcela) {
                ParcelasConsorcios::create([
                    'consorcio_simulator_id'    =>  $c->id,
                    'parcelas'                  =>  $parcela['parcela'],
                    'valor_parcela'             =>  $parcela['valor'],
                ]);
            }
        }
    }
}
