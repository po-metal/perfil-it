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
                    [
                        'label' => 'Jobs',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'PI/Job/Grid',
                    ],
                    [
                        'label' => 'SoftSkill',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'PI/SoftSkill/Grid',
                    ],
                    [
                        'label' => 'SoftSkillCategory',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'PI/SoftSkillCategory/Grid',
                    ],
                ],
            ],
        ],
    ],
];