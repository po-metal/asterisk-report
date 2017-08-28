<?php

namespace MetricaAsterisk\Helper\View;

/**
 * ChartJs
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class ChartJs extends \Zend\View\Helper\AbstractHelper {

    public function __invoke($type, $ejex, $data) {

        $json = [
            'type' => $type,
            'data' => [
                'labels' => $ejex,
                'datasets' => $data
            ],
            'options' => [
                'responsive' => true,
                'title' => [
                    'display' => true,
                    'text' => 'Example'
                ],
                'tooltips' => [
                    'mode' => 'index',
                ],
                'hover' => [
                    'mode' => 'index'
                ],
                'scales' => [
                    'xAxes' => [[
                        'scaleLabel' => [
                            'display' => true,
                            'labelString' => 'Month'
                        ]]
                    ],
                    'yAxes' => [[
                        'stacked' => true,
                        'scaleLabel' => [
                            'display' => true,
                            'labelString' => 'Value'
                        ]]
                    ]
                ]
            ]
        ];

        $encoder = new \Zend\Json\Json();
        return $encoder->encode($json, null, ['prettyPrint' => true]);
    }

}
