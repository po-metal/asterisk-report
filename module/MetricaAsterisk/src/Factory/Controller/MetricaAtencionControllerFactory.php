<?php

namespace MetricaAsterisk\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * MetricaAtencionControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class MetricaAtencionControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        return new \MetricaAsterisk\Controller\MetricaAtencionController($em);
    }


}

