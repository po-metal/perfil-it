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
                                        'controller' => 'PI\\Controller\\CvPictureController',
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
                                        'controller' => 'PI\\Controller\\CvPersonalInformationController',
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
                    'CvSkill' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/cv-skill',
                            'defaults' => [
                                'controller' => \PI\Controller\CvSkillController::CLASS,
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
                                        'controller' => \PI\Controller\CvSkillController::CLASS,
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
                                        'controller' => \PI\Controller\CvSkillController::CLASS,
                                        'action' => 'view',
                                    ],
                                ],
                            ],
                            'Save' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/save',
                                    'defaults' => [
                                        'controller' => \PI\Controller\CvSkillController::CLASS,
                                        'action' => 'save',
                                    ],
                                ],
                            ],
                            'Load' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/load',
                                    'defaults' => [
                                        'controller' => \PI\Controller\CvSkillController::CLASS,
                                        'action' => 'load',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'SkillCategory' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/skill-category',
                            'defaults' => [
                                'controller' => \PI\Controller\SkillCategoryController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \PI\Controller\SkillCategoryController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Skill' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/skill',
                            'defaults' => [
                                'controller' => \PI\Controller\SkillController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \PI\Controller\SkillController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                            'Search' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/search',
                                    'defaults' => [
                                        'controller' => \PI\Controller\SkillController::CLASS,
                                        'action' => 'search',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Eductaion' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/eductaion',
                            'defaults' => [
                                'controller' => \PI\Controller\EducationController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \PI\Controller\EducationController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Education' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/education',
                            'defaults' => [
                                'controller' => \PI\Controller\EducationController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \PI\Controller\EducationController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'EducationState' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/education-state',
                            'defaults' => [
                                'controller' => \PI\Controller\EducationStateController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \PI\Controller\EducationStateController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'CvEducation' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/cv-education',
                            'defaults' => [
                                'controller' => \PI\Controller\CvEducationController::CLASS,
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
                                        'controller' => \PI\Controller\CvEducationController::CLASS,
                                        'action' => 'main',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'CvExperience' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/cv-experience',
                            'defaults' => [
                                'controller' => \PI\Controller\CvExperienceController::CLASS,
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
                                        'controller' => \PI\Controller\CvExperienceController::CLASS,
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
                                        'controller' => \PI\Controller\CvExperienceController::CLASS,
                                        'action' => 'view',
                                    ],
                                ],
                            ],
                            'Save' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/save',
                                    'defaults' => [
                                        'controller' => \PI\Controller\CvExperienceController::CLASS,
                                        'action' => 'save',
                                    ],
                                ],
                            ],
                            'Load' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/load',
                                    'defaults' => [
                                        'controller' => \PI\Controller\CvExperienceController::CLASS,
                                        'action' => 'load',
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