<?php

namespace MetricaAsterisk\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * ColaControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class ColaControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "metricaasterisk-entity-cola"]);
        return new \MetricaAsterisk\Controller\ColaController($em,$grid);
    }


}

