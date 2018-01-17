<?php

return [
    'router' => [
        'routes' => [
            'Df' => [
                'type' => 'Literal',
                'mayTerminate' => false,
                'options' => [
                    'route' => '/df',
                    'defaults' => [
                        'controller' => \Df\Controller\EncuestasControllerController::CLASS,
                        'action' => 'main',
                    ],
                ],
                'child_routes' => [
                    'EncuestasController' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/encuestas-controller',
                            'defaults' => [
                                'controller' => \Df\Controller\EncuestasControllerController::CLASS,
                                'action' => 'main',
                            ],
                        ],
                        'child_routes' => [
                            'Main' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/main',
                                    'defaults' => [
                                        'controller' => \Df\Controller\EncuestasControllerController::CLASS,
                                        'action' => 'main',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'ExamenesController' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/examenes-controller',
                            'defaults' => [
                                'controller' => \Df\Controller\ExamenesControllerController::CLASS,
                                'action' => 'main',
                            ],
                        ],
                        'child_routes' => [
                            'Main' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/main',
                                    'defaults' => [
                                        'controller' => \Df\Controller\ExamenesControllerController::CLASS,
                                        'action' => 'main',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];