<?php

namespace MetricaAsterisk\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * CostoLlamadasControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class CostoLlamadasControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "metricaasterisk-entity-costollamadas"]);
        return new \MetricaAsterisk\Controller\CostoLlamadasController($em,$grid);
    }


}

