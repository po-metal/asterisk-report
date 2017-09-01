<?php

namespace MetricaAsterisk\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * DaemonMetricaAtencionControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class DaemonMetricaAtencionControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        $emCdr = $container->get("doctrine.entitymanager.orm_cdr");
        return new \MetricaAsterisk\Controller\DaemonMetricaAtencionController($em,$emCdr);
    }


}

