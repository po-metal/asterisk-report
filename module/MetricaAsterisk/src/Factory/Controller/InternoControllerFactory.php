<?php

namespace MetricaAsterisk\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * InternoControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class InternoControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "metricaasterisk-entity-interno"]);
        return new \MetricaAsterisk\Controller\InternoController($em,$grid);
    }


}

