<?php

namespace MetricaAsterisk\Factory\Options;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * ModuleOptionsFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class ModuleOptionsFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');
         return new \MetricaAsterisk\Options\ModuleOptions(isset($config['MetricaAsterisk.options']) ? $config['MetricaAsterisk.options'] : array());
    }


}

