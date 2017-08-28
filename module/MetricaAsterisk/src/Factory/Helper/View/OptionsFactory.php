<?php

namespace MetricaAsterisk\Factory\Helper\View;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * OptionsFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class OptionsFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $servicio = $container->get('MetricaAsterisk.options');
        return new \MetricaAsterisk\Helper\View\Options($servicio);
    }


}

