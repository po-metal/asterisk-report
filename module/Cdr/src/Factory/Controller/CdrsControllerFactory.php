<?php

namespace Cdr\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * CdrsControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link -
 */
class CdrsControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_cdr");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "cdr-entity-cdr"]);
        return new \Cdr\Controller\CdrsController($em,$grid);
    }


}

