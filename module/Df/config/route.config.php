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
                        'controller' => \Df\Controller\EncuestasController::CLASS,
                        'action' => 'main',
                    ],
                ],
                'child_routes' => [
                    'Encuestas' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/encuestas',
                            'defaults' => [
                                'controller' => \Df\Controller\EncuestasController::CLASS,
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
                                        'controller' => \Df\Controller\EncuestasController::CLASS,
                                        'action' => 'main',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Examenes' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/examenes',
                            'defaults' => [
                                'controller' => \Df\Controller\ExamenesController::CLASS,
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
                                        'controller' => \Df\Controller\ExamenesController::CLASS,
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