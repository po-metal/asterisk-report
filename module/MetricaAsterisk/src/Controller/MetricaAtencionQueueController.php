<?php

namespace MetricaAsterisk\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * MetricaAtencionQueueController
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class MetricaAtencionQueueController extends AbstractActionController
{

    const ENTITY = '\\Queues\\Entity\\Stats';

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

