<?php

namespace CallCenter\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * AgentesControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link -
 */
class AgentesControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_callcenter");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "callcenter-entity-agent"]);
        return new \CallCenter\Controller\AgentesController($em,$grid);
    }


}

