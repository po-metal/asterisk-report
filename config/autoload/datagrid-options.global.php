<?php

//move to root "config/autoload/"
return array(
    'zf-metal-datagrid.options' => array(
        'recordsPerPage' => 25,
        'template_default' => 'default',
        "crudConfig" => [
            "enable" => true,
            'side' => "right",
            'tdClass' => 'text-center tdVerticalCustom',
            'thClass' => 'text-center',
            'displayName' => 'Acciones',
            'add' => [
                'enable' => true,
                'class' => '',
                'value' => 'Crear',
            ],
           'view' => [
                    'enable' => true,
                    'class' => '',
                    'value' => '<span class="fa-stack btnCircle btn btnBlue"></i><i class="fa fa-search-plus fa-stack-1x"></i></span>',
                ],
                'edit' => [
                    'enable' => true,
                    'class' => 'algo',
                    'value' => '<span class="fa-stack btnCircle btn btnBlue"></i><i class="fa fa-pencil fa-stack-1x"></i></span>',
                ],
                'del' => [ 
                    'enable' => true,
                    'class' => '',
                    'value' => '<span class="fa-stack btnCircle btn btnRed"></i><i class="fa fa-trash-o fa-stack-1x"></i></span>',
                ],
            'manager' => [
                'enable' => false,
                'action' => 'href="{{id}}"',
                'class' => ' table-link success',
                'value' => '<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-cog fa-stack-1x fa-inverse"></i></span>',
            ],
        ],
        'export_config' => [
                'export_to_excel' => [
                    'btn_class' => 'btn btnCustom fa fa-download',
                    'btn_value' => '',
                    'btn_tag' => 'button',
                ],
            ],
    )
);
