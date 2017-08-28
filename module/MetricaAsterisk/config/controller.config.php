<?php

return array(
    'controllers' => array(
        'factories' => array(
            \MetricaAsterisk\Controller\DaemonMetricaAtencionController::class => \MetricaAsterisk\Factory\Controller\DaemonMetricaAtencionControllerFactory::class,
            \MetricaAsterisk\Controller\MetricaAtencionController::class => \MetricaAsterisk\Factory\Controller\MetricaAtencionControllerFactory::class,
            \MetricaAsterisk\Controller\MetricaSalientesController::class => \MetricaAsterisk\Factory\Controller\MetricaSalientesControllerFactory::class,
            \MetricaAsterisk\Controller\DaemonMetricaSalientesController::class => \MetricaAsterisk\Factory\Controller\DaemonMetricaSalientesControllerFactory::class,
            \MetricaAsterisk\Controller\IVRController::class => \MetricaAsterisk\Factory\Controller\IVRControllerFactory::class,
            \MetricaAsterisk\Controller\ColaController::class => \MetricaAsterisk\Factory\Controller\ColaControllerFactory::class,
            \MetricaAsterisk\Controller\InternoController::class => \MetricaAsterisk\Factory\Controller\InternoControllerFactory::class,
            \MetricaAsterisk\Controller\TroncalController::class => \MetricaAsterisk\Factory\Controller\TroncalControllerFactory::class,
            \MetricaAsterisk\Controller\GrupoInternosController::class => \MetricaAsterisk\Factory\Controller\GrupoInternosControllerFactory::class,
            \MetricaAsterisk\Controller\TipoDestinoController::class => \MetricaAsterisk\Factory\Controller\TipoDestinoControllerFactory::class,
            \MetricaAsterisk\Controller\CostoLlamadasController::class => \MetricaAsterisk\Factory\Controller\CostoLlamadasControllerFactory::class,
            \MetricaAsterisk\Controller\MetricaSalienteInternoController::class => \MetricaAsterisk\Factory\Controller\MetricaSalienteInternoControllerFactory::class,
            \MetricaAsterisk\Controller\MetricaSalienteTroncalController::class => \MetricaAsterisk\Factory\Controller\MetricaSalienteTroncalControllerFactory::class,
            \MetricaAsterisk\Controller\MetricaAtencionQueueController::class => \MetricaAsterisk\Factory\Controller\MetricaAtencionQueueControllerFactory::class,
            \MetricaAsterisk\Controller\MetricaAtencionInternoController::class => \MetricaAsterisk\Factory\Controller\MetricaAtencionInternoControllerFactory::class,
            \MetricaAsterisk\Controller\MetricaAtencionIvrController::class => \MetricaAsterisk\Factory\Controller\MetricaAtencionIvrControllerFactory::class,
        ),
    ),
);