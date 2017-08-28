<?php

return [
    'zf-metal-datagrid.custom' => [
        'metricaasterisk-entity-troncal' => [
            'gridId' => 'zfmdg_Troncal',
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \MetricaAsterisk\Entity\Troncal::class,
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
            ],

        ],
    ],
];