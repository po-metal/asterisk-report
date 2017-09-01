<?php

namespace MetricaAsterisk\Controller\Plugin;

/**
 * Options
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class Options extends \Zend\Mvc\Controller\Plugin\AbstractPlugin
{

    private $moduleOptions = null;

    public function __construct(\MetricaAsterisk\Options\ModuleOptions $moduleOptions)
    {
        $this->moduleOptions = $moduleOptions;
    }

    public function __invoke()
    {
        return $this->moduleOptions;
    }


}

