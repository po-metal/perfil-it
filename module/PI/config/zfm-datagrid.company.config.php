<?php

return [
    'zf-metal-datagrid.custom' => [
        'pi-entity-company' => [
            'gridId' => 'zfmdg_Company',
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \PI\Entity\Company::class,
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
                'logo' => [
                    'type' => 'file',
                    'width' => "50px",
                    'height' => "50px",
                    'webpath' => "/media/company/logo",
                    'showFile' => true
                ],
                'createdAt' => [
                    'type' => 'date',
                    'format' => 'Y-m-d H:i:s',
                ],
                'updatedAt' => [
                    'type' => 'date',
                    'format' => 'Y-m-d H:i:s',
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