<?php

return [
    'router' => [
        'routes' => [
            'PI' => [
                'type' => 'Literal',
                'mayTerminate' => false,
                'options' => [
                    'route' => '/pi',
                    'defaults' => [
                        'controller' => \PI\Controller\CvController::CLASS,
                        'action' => 'index',
                    ],
                ],
                'child_routes' => [
                    'Cv' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/cv',
                            'defaults' => [
                                'controller' => \PI\Controller\CvController::CLASS,
                                'action' => 'index',
                            ],
                        ],
                        'child_routes' => [
                            'Index' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/index',
                                    'defaults' => [
                                        'controller' => \PI\Controller\CvController::CLASS,
                                        'action' => 'index',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'CvPicture' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/cv-picture',
                            'defaults' => [
                                'controller' => \PI\Controller\CvPictureController::CLASS,
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
                                        'controller' => \PI\Controller\CvPictureController::CLASS,
                                        'action' => 'main',
                                    ],
                                ],
                            ],
                            'Picture' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/picture',
                                    'defaults' => [
                                        'controller' => \PI\Controller\CvPictureController::CLASS,
                                        'action' => 'view',
                                    ],
                                ],
                            ],
                            'View' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/view',
                                    'defaults' => [
                                        'controller' => \PI\Controller\CvPictureController::CLASS,
                                        'action' => 'view',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'CvPersonalInformation' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/cv-personal-information',
                            'defaults' => [
                                'controller' => \PI\Controller\CvPersonalInformationController::CLASS,
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
                                        'controller' => \PI\Controller\CvPersonalInformationController::CLASS,
                                        'action' => 'main',
                                    ],
                                ],
                            ],
                            'PersonalInformation' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/personal-information',
                                    'defaults' => [
                                        'controller' => \PI\Controller\CvPersonalInformationController::CLASS,
                                        'action' => 'view',
                                    ],
                                ],
                            ],
                            'View' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/view',
                                    'defaults' => [
                                        'controller' => \PI\Controller\CvPersonalInformationController::CLASS,
                                        'action' => 'view',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'CvContact' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/cv-contact',
                            'defaults' => [
                                'controller' => \PI\Controller\CvContactController::CLASS,
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
                                        'controller' => \PI\Controller\CvContactController::CLASS,
                                        'action' => 'main',
                                    ],
                                ],
                            ],
                            'View' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/view',
                                    'defaults' => [
                                        'controller' => \PI\Controller\CvContactController::CLASS,
                                        'action' => 'view',
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