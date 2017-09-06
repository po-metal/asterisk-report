<?php

return [
    'router' => [
        'routes' => [
            'MetricaAsterisk' => [
                'type' => 'Literal',
                'mayTerminate' => false,
                'options' => [
                    'route' => '/metrica-asterisk',
                    'defaults' => [
                        'controller' => \MetricaAsterisk\Controller\DaemonMetricaAtencionController::CLASS,
                        'action' => 'run',
                    ],
                ],
                'child_routes' => [
                    'DaemonMetricaAtencion' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/daemon-metrica-atencion',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\DaemonMetricaAtencionController::CLASS,
                                'action' => 'run',
                            ],
                        ],
                        'child_routes' => [
                            'Run' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/run',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\DaemonMetricaAtencionController::CLASS,
                                        'action' => 'run',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'MetricaAtencion' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/metrica-atencion',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\MetricaAtencionController::CLASS,
                                'action' => 'main',
                            ],
                        ],
                        'child_routes' => [
                            'Main' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/main',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionController::CLASS,
                                        'action' => 'main',
                                    ],
                                ],
                            ],
                            'Anual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/anual[/:anio]',
                                    'defaults' => [
                                        'controller' => 'MetricaAsterisk\\Controller\\MetricaAtencionIvrController',
                                        'action' => 'anual',
                                    ],
                                ],
                            ],
                            'Mensual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/mensual[/:anio/:mes]',
                                    'defaults' => [
                                        'controller' => 'MetricaAsterisk\\Controller\\MetricaAtencionIvrController',
                                        'action' => 'mensual',
                                    ],
                                ],
                            ],
                            'Diario' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/diario[/:anio/:mes/:dia]',
                                    'defaults' => [
                                        'controller' => 'MetricaAsterisk\\Controller\\MetricaAtencionIvrController',
                                        'action' => 'diario',
                                    ],
                                ],
                            ],
                            'SinRegistros' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/sin-registros',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionController::CLASS,
                                        'action' => 'sinRegistros',
                                    ],
                                ],
                            ],
                            'Detalle' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/detalle[/:anio/:mes/:dia/:hora]',
                                    'defaults' => [
                                        'controller' => 'MetricaAsterisk\\Controller\\MetricaAtencionIvrController',
                                        'action' => 'detalle',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'MetricaSalientes' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/metrica-salientes',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\MetricaSalientesController::CLASS,
                                'action' => 'anual',
                            ],
                        ],
                        'child_routes' => [
                            'Anual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/anual[/:anio]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaSalientesController::CLASS,
                                        'action' => 'anual',
                                    ],
                                ],
                            ],
                            'Mensual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/mensual[/:anio/:mes]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaSalientesController::CLASS,
                                        'action' => 'mensual',
                                    ],
                                ],
                            ],
                            'Diario' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/diario[/:anio/:mes/:dia]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaSalientesController::CLASS,
                                        'action' => 'diario',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'DaemonMetricaSalientes' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/daemon-metrica-salientes',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\DaemonMetricaSalientesController::CLASS,
                                'action' => 'run',
                            ],
                        ],
                        'child_routes' => [
                            'Run' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/run',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\DaemonMetricaSalientesController::CLASS,
                                        'action' => 'run',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'IVR' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/ivr',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\IVRController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\IVRController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Cola' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/cola',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\ColaController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\ColaController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Interno' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/interno',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\InternoController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\InternoController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Troncal' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/troncal',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\TroncalController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\TroncalController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'GrupoInternos' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/grupo-internos',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\GrupoInternosController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\GrupoInternosController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'TipoDestino' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/tipo-destino',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\TipoDestinoController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\TipoDestinoController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'CostoLlamadas' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/costo-llamadas',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\CostoLlamadasController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\CostoLlamadasController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'MetricaSalienteIvr' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/metrica-saliente-ivr',
                            'defaults' => [
                                'controller' => 'MetricaAsterisk\\Controller\\MetricaSalienteIvrController',
                                'action' => 'anual',
                            ],
                        ],
                        'child_routes' => [
                            'Anual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/anual[/:anio]',
                                    'defaults' => [
                                        'controller' => 'MetricaAsterisk\\Controller\\MetricaSalienteIvrController',
                                        'action' => 'anual',
                                    ],
                                ],
                            ],
                            'Mensual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/mensual[/:anio/:mes]',
                                    'defaults' => [
                                        'controller' => 'MetricaAsterisk\\Controller\\MetricaSalienteIvrController',
                                        'action' => 'mensual',
                                    ],
                                ],
                            ],
                            'Diario' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/diario[/:anio/:mes/:dia]',
                                    'defaults' => [
                                        'controller' => 'MetricaAsterisk\\Controller\\MetricaSalienteIvrController',
                                        'action' => 'diario',
                                    ],
                                ],
                            ],
                            'Detallado' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/detallado[/:desde/:hasta]',
                                    'defaults' => [
                                        'controller' => 'MetricaAsterisk\\Controller\\MetricaSalienteIvrController',
                                        'action' => 'detallado',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'MetricaSalienteInterno' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/metrica-saliente-interno',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\MetricaSalienteInternoController::CLASS,
                                'action' => 'anual',
                            ],
                        ],
                        'child_routes' => [
                            'Anual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/anual[/:anio]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaSalienteInternoController::CLASS,
                                        'action' => 'anual',
                                    ],
                                ],
                            ],
                            'Mensual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/mensual[/:anio/:mes]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaSalienteInternoController::CLASS,
                                        'action' => 'mensual',
                                    ],
                                ],
                            ],
                            'Diario' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/diario[/:anio/:mes/:dia]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaSalienteInternoController::CLASS,
                                        'action' => 'diario',
                                    ],
                                ],
                            ],
                            'Detallado' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/detallado',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaSalienteInternoController::CLASS,
                                        'action' => 'detallado',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'MetricaSalienteTroncal' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/metrica-saliente-troncal',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\MetricaSalienteTroncalController::CLASS,
                                'action' => 'anual',
                            ],
                        ],
                        'child_routes' => [
                            'Anual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/anual[/:anio]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaSalienteTroncalController::CLASS,
                                        'action' => 'anual',
                                    ],
                                ],
                            ],
                            'Mensual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/mensual[/:anio/:mes]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaSalienteTroncalController::CLASS,
                                        'action' => 'mensual',
                                    ],
                                ],
                            ],
                            'Diario' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/diario[/:anio/:mes/:dia]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaSalienteTroncalController::CLASS,
                                        'action' => 'diario',
                                    ],
                                ],
                            ],
                            'Detallado' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/detallado[/:desde/:hasta]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaSalienteTroncalController::CLASS,
                                        'action' => 'detallado',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'MetricaAtencionQueue' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/metrica-atencion-queue',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\MetricaAtencionQueueController::CLASS,
                                'action' => 'anual',
                            ],
                        ],
                        'child_routes' => [
                            'Anual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/anual[/:anio]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionQueueController::CLASS,
                                        'action' => 'anual',
                                    ],
                                ],
                            ],
                            'Mensual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/mensual[/:anio/:mes]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionQueueController::CLASS,
                                        'action' => 'mensual',
                                    ],
                                ],
                            ],
                            'Diario' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/diario',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionQueueController::CLASS,
                                        'action' => 'diario',
                                    ],
                                ],
                            ],
                            'Detallado' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/detallado[/:desde/:hasta]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionQueueController::CLASS,
                                        'action' => 'detallado',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'MetricaAtencionInterno' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/metrica-atencion-interno',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\MetricaAtencionInternoController::CLASS,
                                'action' => 'anual',
                            ],
                        ],
                        'child_routes' => [
                            'Anual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/anual',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionInternoController::CLASS,
                                        'action' => 'anual',
                                    ],
                                ],
                            ],
                            'Mensual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/mensual',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionInternoController::CLASS,
                                        'action' => 'mensual',
                                    ],
                                ],
                            ],
                            'Diario' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/diario[/:anio/:mes/:dia]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionInternoController::CLASS,
                                        'action' => 'diario',
                                    ],
                                ],
                            ],
                            'Detallado' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/detallado',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionInternoController::CLASS,
                                        'action' => 'detallado',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'MetricaAtencionIvr' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/metrica-atencion-ivr',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\MetricaAtencionController::CLASS,
                                'action' => 'main',
                            ],
                        ],
                        'child_routes' => [
                            'Anual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/anual[/:anio]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionIvrController::CLASS,
                                        'action' => 'anual',
                                    ],
                                ],
                            ],
                            'Mensual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/mensual[/:anio/:mes]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionIvrController::CLASS,
                                        'action' => 'mensual',
                                    ],
                                ],
                            ],
                            'Diario' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/diario[/:anio/:mes/:dia]',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionIvrController::CLASS,
                                        'action' => 'diario',
                                    ],
                                ],
                            ],
                            'SinRegistros' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/sin-registros',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionController::CLASS,
                                        'action' => 'sinRegistros',
                                    ],
                                ],
                            ],
                            'Detalle' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/detalle',
                                    'defaults' => [
                                        'controller' => 'MetricaAsterisk\\Controller\\MetricaAtencionIvrController',
                                        'action' => 'detalle',
                                    ],
                                ],
                            ],
                            'Detallado' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/detallado',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\MetricaAtencionIvrController::CLASS,
                                        'action' => 'detallado',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'DaemonMetricsQueue' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/daemon-metrics-queue',
                            'defaults' => [
                                'controller' => \MetricaAsterisk\Controller\DaemonMetricsQueueController::CLASS,
                                'action' => 'run',
                            ],
                        ],
                        'child_routes' => [
                            'Run' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/run',
                                    'defaults' => [
                                        'controller' => \MetricaAsterisk\Controller\DaemonMetricsQueueController::CLASS,
                                        'action' => 'run',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];