<?php

return array(
    'view_helpers' => array(
        'invokables' => array(
            'metricaAsteriskChartJs' => \MetricaAsterisk\Helper\View\ChartJs::class,
            'metricaAsteriskChartJsData' => \MetricaAsterisk\Helper\View\ChartJsData::class,
        ),
        'factories' => array(
            'metricaAsteriskOptions' => \MetricaAsterisk\Factory\Helper\View\OptionsFactory::class,
            'metricaAsteriskTiposDestino' => \MetricaAsterisk\Factory\Helper\View\TiposDestinoFactory::class,
        ),
    ),
);