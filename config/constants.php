<?php

return [
    'menus' =>  [
        'admin' =>  [
            'adminlte.menu' => [
                [
                    'type'         => 'fullscreen-widget',
                    'topnav_right' => true,
                ],
                [
                    'text' => 'Administradoras',
                    'url'  => 'administradoras',
                    'icon' => 'fas fa-fw fa-lock',
                ]
            ],
        ],
        'coordenador'   =>  [
            [
                'type'         => 'fullscreen-widget',
                'topnav_right' => true,
            ],
        ],
        'seller'    =>  [
            [
                'type'         => 'fullscreen-widget',
                'topnav_right' => true,
            ],
        ],
    ]
];
