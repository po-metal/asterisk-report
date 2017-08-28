<?php

return [
    'navigation' => [
        'default' => [
            [
                'label' => 'Dashboard',
                'detail' => '',
                'icon' => '',
                'route' => 'MetricaAsterisk/MetricaAtencion/Main',
            ],
            [
                'label' => 'Métrica Atención',
                'detail' => '',
                'icon' => '',
                'permission' => 'general-ver',
                'uri' => '',
                'pages' => [
                    [
                        'label' => 'IVRs',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-ver',
                        'uri' => '',
                        'pages' => [
                            [
                                'label' => 'Anual',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaAtencionIvr/Anual',
                                'params' => [
                                    'tipo' => 'IVR',
                                ],
                            ],
                            [
                                'label' => 'Mensual',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaAtencionIvr/Mensual',
                                'params' => [
                                    'tipo' => 'IVR',
                                ],
                            ],
                            [
                                'label' => 'Diario',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaAtencionIvr/Diario',
                                'params' => [
                                    'tipo' => 'IVR',
                                ],
                            ],
                        ],
                        'route' => 'MetricaAsterisk/MetricaAtencion',
                    ],
                    [
                        'label' => 'Colas',
                        'detail' => '',
                        'icon' => '',
                        'uri' => '',
                        'pages' => [
                            [
                                'label' => 'Anual',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaAtencionQueue/Anual',
                            ],
                            [
                                'label' => 'Mensual',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaAtencionQueue/Mensual',
                            ],
                            [
                                'label' => 'Diario',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaAtencionQueue/Diario',
                            ],
                            [
                                'label' => 'Detallado',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaAtencionQueue/Detallado',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Internos',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-ver',
                        'uri' => '',
                        'pages' => [
                            [
                                'label' => 'Anual',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaAtencionInterno/Anual',
                            ],
                            [
                                'label' => 'Mensual',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaAtencionInterno/Mensual',
                            ],
                            [
                                'label' => 'Diario',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaAtencionInterno/Diario',
                            ],
                            [
                                'label' => 'Detallado',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaSalienteInterno/Detallado',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'label' => 'Metrica Salientes',
                'detail' => '',
                'icon' => '',
                'permission' => 'general-ver',
                'uri' => '',
                'pages' => [
                    [
                        'label' => 'Troncal',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-ver',
                        'route' => 'MetricaAsterisk/MetricaSalientes/Anual',
                        'uri' => '',
                        'pages' => [
                            [
                                'label' => 'Anual',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaSalienteTroncal/Anual',
                            ],
                            [
                                'label' => 'Mensual',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaSalienteTroncal/Mensual',
                            ],
                            [
                                'label' => 'Diario',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaSalienteTroncal/Diario',
                            ],
                            [
                                'label' => 'Detallado',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaSalienteTroncal/Detallado',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Internos',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-ver',
                        'route' => 'MetricaAsterisk/MetricaSalientes/Mensual',
                        'uri' => '',
                        'pages' => [
                            [
                                'label' => 'Anual',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaSalienteInterno/Anual',
                            ],
                            [
                                'label' => 'Mensual',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaSalienteInterno/Mensual',
                            ],
                            [
                                'label' => 'Diario',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaSalienteInterno/Diario',
                            ],
                            [
                                'label' => 'Detallado',
                                'detail' => '',
                                'icon' => '',
                                'permission' => 'general-ver',
                                'route' => 'MetricaAsterisk/MetricaSalienteInterno/Detallado',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'label' => 'Configuración',
                'detail' => '',
                'icon' => '',
                'permission' => 'general-admin',
                'uri' => '',
                'pages' => [
                    [
                        'label' => 'IVRs',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'MetricaAsterisk/IVR/Grid',
                    ],
                    [
                        'label' => 'Colas',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'MetricaAsterisk/Cola/Grid',
                    ],
                    [
                        'label' => 'Internos',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'MetricaAsterisk/Interno/Grid',
                    ],
                    [
                        'label' => 'Troncales',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'MetricaAsterisk/Troncal/Grid',
                    ],
                    [
                        'label' => 'Grupo de Internos',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'MetricaAsterisk/GrupoInternos/Grid',
                    ],
                    [
                        'label' => 'Tipos de Destinos',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'MetricaAsterisk/TipoDestino/Grid',
                    ],
                    [
                        'label' => 'Costo de Llamadas',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'MetricaAsterisk/CostoLlamadas/Grid',
                    ],
                ],
            ],
        ],
    ],
];