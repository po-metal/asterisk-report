<?php

namespace MetricaAsterisk\Factory\Helper\View;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * TiposDestinoFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class TiposDestinoFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
         /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        return new \MetricaAsterisk\Helper\View\TiposDestino($em);
    }


}

