<?php

namespace Cdr\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * ReporteInternosControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link -
 */
class ReporteInternosControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_cdr");
        return new \Cdr\Controller\ReporteInternosController($em);
    }


}

