<?php

return [
    'zf-metal-datagrid.custom' => [
        'cdr-entity-cdr' => [
            'gridId' => 'zfmdg_Cdr',
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \Cdr\Entity\Cdr::class,
                    'entityManager' => 'doctrine.entitymanager.orm_cdr',
                ],
            ],
            'formConfig' => [
                'columns' => \ZfMetal\Commons\Consts::COLUMNS_ONE,
                'style' => \ZfMetal\Commons\Consts::STYLE_VERTICAL,
            ],
            'columnsConfig' => [
                'calldate' => [
                    'displayName' => 'Fecha',
                    'type' => 'date',
                    'format' => 'Y-m-d H:i:s',
                ],
                'src' => [
                    'displayName' => 'Origen',
                ],
                'dst' => [
                    'displayName' => 'Destino',
                ],
                'disposition' => [
                    'displayName' => 'Resultado',
                ],
                'duration' => [
                    'displayName' => 'Duración Total',
                ],
                'billsec' => [
                    'displayName' => 'Tiempo Tarifado',
                ],
                'dcontext' => [
                    'displayName' => 'Contexto',
                ],
                  'dstchannel' => [
                ],
                    'uniqueid' => [
                    'hidden'=> true
                ],
            ],
            'crudConfig' => [
                'enable' => false,
                'add' => [
                    'enable' => false,
                    'class' => ' glyphicon glyphicon-plus cursor-pointer',
                    'value' => '',
                ],
                'edit' => [
                    'enable' => false,
                    'class' => ' glyphicon glyphicon-edit cursor-pointer',
                    'value' => '',
                ],
                'del' => [
                    'enable' => false,
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