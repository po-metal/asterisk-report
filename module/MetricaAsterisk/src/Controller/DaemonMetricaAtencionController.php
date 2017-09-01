<?php

namespace MetricaAsterisk\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * DaemonMetricaAtencionController
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class DaemonMetricaAtencionController extends AbstractActionController {

    const ENTITY = '\\MetricaAsterisk\\Entity\\MetricaAtencion';

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

    public function __construct(\Doctrine\ORM\EntityManager $em, \Doctrine\ORM\EntityManager $emCdr) {
        $this->em = $em;
        $this->emCdr = $emCdr;
    }

    /**
     * 
     * @return \MetricaAsterisk\Repository\MetricaAtencionRepository
     */
    public function getMetricaAtencionRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    /**
     * 
     * @return \Cdr\Repository\CdrRepository
     */
    public function getCdrRepository() {
        return $this->getEmCdr()->getRepository('\\Cdr\\Entity\\Cdr');
    }

    public function runAction() {

        //Consumo Metrica QUEUES desde CDR
        $recordsQueues = $this->getCdrRepository()->getMetricaQueues("2017-01-01","2018-01-01");

        //Inserto Metrica Queues en tabla Sumaraizada "MetricaAtencion"
//        if (count($recordsQueues)) {
//            $this->getMetricaAtencionRepository()->insertObjects($recordsQueues);
//        }


        //Consumo Metrica IVR desde CDR
        $recordsIVR = $this->getCdrRepository()->getMetricaIVR("2017-01-01","2018-01-01",['01152353838']);

        //Inserto Metrica IVR en tabla Sumaraizada "MetricaAtencion"
        if (count($recordsIVR)) {
            $this->getMetricaAtencionRepository()->insertObjects($recordsIVR);
        }


        return "ok";
    }

}
