<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administradoras;

class AdministradorasTableSeeder extends Seeder
{
    private $administradoras = [
        [
            'administradora'    =>  'Itaú',
            'dia_assembleia'    =>  20
        ],
        [
            'administradora'    =>  'Santander',
            'dia_assembleia'    =>  21
        ],
        [
            'administradora'    =>  'Recon',
            'dia_assembleia'    =>  22
        ],
        [
            'administradora'    =>  'Magazine Luíza',
            'dia_assembleia'    =>  23
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->administradoras as $administradora ) {
            Administradoras::create($administradora);
        }
    }
}
