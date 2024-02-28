<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    private $users = [
        [
            'name'      =>  'Admin',
            'email'     =>  'admin@admin.com',
            'password'  =>  'ImAdmin',
            'level'     =>  'admin',
            'active'    =>  true,
        ],
        [
            'name'      =>  'coordinator',
            'email'     =>  'coordinator@coordinator.com',
            'password'  =>  'ImCoordinator',
            'level'     =>  'coordinator',
            'active'    =>  true,
        ],
        [
            'name'      =>  'Seller',
            'email'     =>  'seller@seller.com',
            'password'  =>  'ImSeller',
            'level'     =>  'seller',
            'active'    =>  true,
        ],
        [
            'name'      =>  'Vendedor 1',
            'email'     =>  'vendedor1@gol.com',
            'password'  =>  'ImSeller',
            'level'     =>  'seller',
            'active'    =>  true,
        ],
        [
            'name'      =>  'Vendedor 2',
            'email'     =>  'vendedor2@gol.com',
            'password'  =>  'ImSeller',
            'level'     =>  'seller',
            'active'    =>  true,
        ],
        [
            'name'      =>  'Marketing',
            'email'     =>  'marketing@gol.com',
            'password'  =>  'ImMarketing',
            'level'     =>  'marketing',
            'active'    =>  true,
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as $user) {
            User::create([
                'name'      =>  $user['name'],
                'email'     =>  $user['email'],
                'password'  =>  bcrypt($user['password']),
                'level'     =>  $user['level'],
                'active'    =>  true,
            ]);
        }

    }
}
