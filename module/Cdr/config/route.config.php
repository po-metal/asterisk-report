<?php

return [
    'router' => [
        'routes' => [
            'Cdr' => [
                'type' => 'Literal',
                'mayTerminate' => false,
                'options' => [
                    'route' => '/cdr',
                    'defaults' => [
                        'controller' => \Cdr\Controller\CdrsController::CLASS,
                        'action' => 'grid',
                    ],
                ],
                'child_routes' => [
                    'Cdrs' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/cdrs',
                            'defaults' => [
                                'controller' => \Cdr\Controller\CdrsController::CLASS,
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
                                        'controller' => \Cdr\Controller\CdrsController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'ReporteInternos' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/reporte-internos',
                            'defaults' => [
                                'controller' => \Cdr\Controller\ReporteInternosController::CLASS,
                                'action' => 'diario',
                            ],
                        ],
                        'child_routes' => [
                            'Diario' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/diario',
                                    'defaults' => [
                                        'controller' => \Cdr\Controller\ReporteInternosController::CLASS,
                                        'action' => 'diario',
                                    ],
                                ],
                            ],
                            'Mensual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/mensual',
                                    'defaults' => [
                                        'controller' => \Cdr\Controller\ReporteInternosController::CLASS,
                                        'action' => 'mensual',
                                    ],
                                ],
                            ],
                            'Anual' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/anual',
                                    'defaults' => [
                                        'controller' => \Cdr\Controller\ReporteInternosController::CLASS,
                                        'action' => 'anual',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Transferencias' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/transferencias',
                            'defaults' => [
                                'controller' => \Cdr\Controller\TransferenciasController::CLASS,
                                'action' => 'diario',
                            ],
                        ],
                        'child_routes' => [
                            'Diario' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/diario',
                                    'defaults' => [
                                        'controller' => \Cdr\Controller\TransferenciasController::CLASS,
                                        'action' => 'diario',
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