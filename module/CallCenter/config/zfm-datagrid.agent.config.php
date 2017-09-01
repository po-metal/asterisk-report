<?php

return [
    'zf-metal-datagrid.custom' => [
        'callcenter-entity-agent' => [
            'gridId' => 'zfmdg_Agent',
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \CallCenter\Entity\Agent::class,
                    'entityManager' => 'doctrine.entitymanager.orm_callcenter',
                ],
            ],
            'formConfig' => [
                'columns' => \ZfMetal\Commons\Consts::COLUMNS_ONE,
                'style' => \ZfMetal\Commons\Consts::STYLE_VERTICAL,
            ],
            'columnsConfig' => [
                'agent' => [
                    'displayName' => 'Agente',
                ],
                'name' => [
                    'displayName' => 'Nombre',
                ],
                'estatus' => [
                    'displayName' => 'Estado',
                ],
            ],
            'crudConfig' => [
                'enable' => true,
                'add' => [
                    'enable' => false,
                    'class' => ' glyphicon glyphicon-plus cursor-pointer',
                    'value' => '',
                ],
                'view' => [
                    'enable' => true,
                    'class' => ' table-link',
                    'value' => '<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-search-plus fa-stack-1x fa-inverse"></i></span>',
                ],
                'edit' => [
                    'enable' => false,
                    'class' => ' table-link',
                    'value' => '<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i></span>',
                ],
                'del' => [
                    'enable' => false,
                    'class' => ' table-link danger',
                    'value' => '<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i></span>',
                ],
                'manager' => [
                    'enable' => false,
                    'action' => 'href="{{id}}"',
                    'class' => ' table-link success',
                    'value' => '<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-cog fa-stack-1x fa-inverse"></i></span>',
                ],
            ],
        ],
    ],
];
