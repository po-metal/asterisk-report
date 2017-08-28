<?php

return array(
    'controllers' => array(
        'factories' => array(
            \Cdr\Controller\CdrsController::class => \Cdr\Factory\Controller\CdrsControllerFactory::class,
            \Cdr\Controller\ReporteInternosController::class => \Cdr\Factory\Controller\ReporteInternosControllerFactory::class,
            \Cdr\Controller\TransferenciasController::class => \Cdr\Factory\Controller\TransferenciasControllerFactory::class,
        ),
    ),
);