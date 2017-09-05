<?php

namespace MetricaAsterisk\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * DaemonMetricsQueueController
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class DaemonMetricsQueueController extends AbstractActionController {

    const ENTITY = '\\MetricaAsterisk\\Entity\\MetricsQueue';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $emQueue = null;

    public function getEm() {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    function getEmQueue(){
        return $this->emQueue;
    }

    function setEmQueue(\Doctrine\ORM\EntityManager $emQueue) {
        $this->emQueue = $emQueue;
    }

      /**
     * 
     * @return \MetricaAsterisk\Repository\MetricsQueueRepository
     */
    public function getMetricsQueueRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }
    
    /**
     * 
     * @return \Queue\Repository\QueueStatsRepository
     */
     public function getQueueStatsRepository() {
        return $this->getEmQueue()->getRepository("Queues\Entity\QueueStats");
    }

    public function __construct(\Doctrine\ORM\EntityManager $em, \Doctrine\ORM\EntityManager $emQueue) {
        $this->em = $em;
        $this->emQueue = $emQueue;
    }

    public function runAction() {

        $queueStatsRecords = $this->getQueueStatsRepository()->getBase("2017-08-01", "2017-09-01");

        //Inserto Metrica en tabla Sumaraizada "MetricaSalientes"
        if (count($queueStatsRecords)) {
            $this->getMetricsQueueRepository()->insertBase($queueStatsRecords);
        }
    }

}
