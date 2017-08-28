<?php

return [
    'zf-metal-datagrid.custom' => [
        'metricaasterisk-entity-tipodestino' => [
            'gridId' => 'zfmdg_TipoDestino',
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \MetricaAsterisk\Entity\TipoDestino::class,
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
                'class' => [
                    'displayName' => 'Clase CSS',
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