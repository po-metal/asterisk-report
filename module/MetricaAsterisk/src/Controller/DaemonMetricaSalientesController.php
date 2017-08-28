<?php

namespace MetricaAsterisk\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * DaemonMetricaSalientesController
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class DaemonMetricaSalientesController extends AbstractActionController {

    const ENTITY = '\\MetricaAsterisk\\Entity\\MetricaSalientes';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $emCdr = null;

    public function getEm() {
        return $this->em;
    }

    function getEmCdr() {
        return $this->emCdr;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function getMetricaSalienteRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    /**
     * 
     * @return \Cdr\Repository\CdrRepository
     */
    public function getCdrRepository() {
        return $this->getEmCdr()->getRepository('\\Cdr\\Entity\\Cdr');
    }

    public function __construct(\Doctrine\ORM\EntityManager $em, \Doctrine\ORM\EntityManager $emCdr) {
        $this->em = $em;
        $this->emCdr = $emCdr;
    }

    public function runAction() {
        
        $tiposDestino = $this->getEm()->getRepository("MetricaAsterisk\Entity\TipoDestino")->obtenerPorPrioridad();
        $troncales = $this->getEm()->getRepository("MetricaAsterisk\Entity\Troncal")->findAll();
        
        //Consumo Metrica QUEUES desde CDR
        $records = $this->getCdrRepository()->getMetricaSalientes("2017-08-01", "2017-09-01",$troncales,$tiposDestino);

        //Inserto Metrica en tabla Sumaraizada "MetricaSalientes"
        if (count($records)) {
            $this->getMetricaSalienteRepository()->insertObjects($records);
        }



        return "ok";
    }

}
