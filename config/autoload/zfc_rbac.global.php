<?php

return [
    'zfc_rbac' => [
        'guest_role' => 'invitado',
        'guards' => [
            'ZfcRbac\Guard\RouteGuard' => [
                'PI/CvVue/Main' => ['usuario','admin'],
                'PI/JobAc/Search' => ['usuario','admin'],
                'Pi*' => ['admin', 'usuario'],

               // 'Pi*' => ['invitado'],
                //'home' => ['admin','usuario'],
            ]
        ],
    ]
];
