<?php

return [
    'zfc_rbac' => [
        'guest_role' => 'invitado',
        'guards' => [
            'ZfcRbac\Guard\RouteGuard' => [

                'Pi*' => ['admin', 'usuario'],
               // 'Pi*' => ['invitado'],
                //'home' => ['admin','usuario'],
            ]
        ],
    ]
];
