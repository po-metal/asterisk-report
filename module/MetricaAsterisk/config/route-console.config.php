<?php

return [
    'console' => array(
        'router' => array(
            'routes' => array(
                'daemon_atencion' => array(
                    'options' => array(
                        // add [ and ] if optional ( ex : [<doname>] )
                        'route' => 'atencion [--verbose|-v] [<option>]',
                        'defaults' => array(
                            'controller' => \MetricaAsterisk\Controller\DaemonMetricaAtencionController::class,
                            'action' => 'run'
                        ),
                    ),
                ),
                'daemon_salientes' => array(
                    'options' => array(
                        // add [ and ] if optional ( ex : [<doname>] )
                        'route' => 'salientes [--verbose|-v] [<option>]',
                        'defaults' => array(
                            'controller' => \MetricaAsterisk\Controller\DaemonMetricaSalientesController::class,
                            'action' => 'run'
                        ),
                    ),
                ),
            )
        )
    )
];
