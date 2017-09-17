<?php

return [
    'navigation' => [
        'default' => [
            [
                'label' => 'CV',
                'detail' => '',
                'icon' => 'fa fa-suitcase',
                'permission' => 'general-ver',
                'route' => 'PI/Cv/Index',
            ],
            [
                'label' => 'Admin',
                'detail' => '',
                'icon' => '',
                'permission' => 'general-admin',
                'uri' => '',
                'pages' => [
                    [
                        'label' => 'Skills',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'PI/Skill/Grid',
                    ],
                    [
                        'label' => 'Skill Categories',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'PI/SkillCategory/Grid',
                    ],
                    [
                        'label' => 'Educación',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'PI/Eductaion/Grid',
                    ],
                    [
                        'label' => 'Estado de Educación',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'PI/EducationState/Grid',
                    ],
                ],
            ],
        ],
    ],
];