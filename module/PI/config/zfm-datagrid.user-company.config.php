<?php

return [
    'zf-metal-datagrid.custom' => [
        'pi-entity-usercompany' => [
            'gridId' => 'zfmdg_UserCompany',
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \PI\Entity\UserCompany::class,
                    'entityManager' => 'doctrine.entitymanager.orm_default',
                ],
            ],
            'formConfig' => [
                'columns' => \ZfMetal\Commons\Consts::COLUMNS_ONE,
                'style' => \ZfMetal\Commons\Consts::STYLE_VERTICAL,
                'groups' => [
                    
                ],
            ],
            'columnsConfig' => [
                'id' => [
                    'displayName' => 'ID',
                ],
                'user' => [
                    'type' => 'relational',
                ],
                'company' => [
                    'type' => 'relational',
                ],
            ],
            'crudConfig' => [
                'enable' => true,
                'add' => [
                    'enable' => true,
                    'class' => ' glyphicon glyphicon-plus cursor-pointer',
                    'value' => '',
                ],
                'edit' => [
                    'enable' => true,
                    'class' => ' glyphicon glyphicon-edit cursor-pointer',
                    'value' => '',
                ],
                'del' => [
                    'enable' => true,
                    'class' => ' glyphicon glyphicon-trash cursor-pointer',
                    'value' => '',
                ],
                'view' => [
                    'enable' => true,
                    'class' => ' glyphicon glyphicon-list-alt cursor-pointer',
                    'value' => '',
                ],
            ],
        ],
    ],
];