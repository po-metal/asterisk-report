<?php

return [
    'router' => [
        'routes' => [
            'CallCenter' => [
                'type' => 'Literal',
                'mayTerminate' => false,
                'options' => [
                    'route' => '/call-center',
                    'defaults' => [
                        'controller' => \CallCenter\Controller\AgentesController::CLASS,
                        'action' => 'grid',
                    ],
                ],
                'child_routes' => [
                    'Agentes' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/agentes',
                            'defaults' => [
                                'controller' => \CallCenter\Controller\AgentesController::CLASS,
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
                                        'controller' => \CallCenter\Controller\AgentesController::CLASS,
                                        'action' => 'grid',
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