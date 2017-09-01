<?php

namespace MetricaAsterisk\Helper\View;

/**
 * Options
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class Options extends \Zend\View\Helper\AbstractHelper
{

    private $moduleOptions = null;

    public function __invoke()
    {
        return $this->moduleOptions;
    }

    public function __construct(\MetricaAsterisk\Options\ModuleOptions $moduleOptions)
    {
        $this->moduleOptions = $moduleOptions;
    }


}

