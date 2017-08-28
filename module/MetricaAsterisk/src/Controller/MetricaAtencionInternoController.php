<?php

namespace MetricaAsterisk\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * MetricaAtencionInternoController
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class MetricaAtencionInternoController extends AbstractActionController
{

    const ENTITY = '\\MetricaAsterisk\\Entity\\MetricaAtencion';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    public function getEm()
    {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function anualAction()
    {
        return [];
    }

    public function mensualAction()
    {
        return [];
    }

    public function diarioAction()
    {
        return [];
    }

    public function detalladoAction()
    {
        return [];
    }


}

