<?php

return array(
    'controller_plugins' => array(
        'factories' => array(
            \MetricaAsterisk\Controller\Plugin\Options::class => \MetricaAsterisk\Factory\Controller\Plugin\OptionsFactory::class,
        ),
        'aliases' => array(
            'metricaAsteriskOptions' => \MetricaAsterisk\Controller\Plugin\Options::class,
        ),
    ),
);