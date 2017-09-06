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
class MetricaAtencionQueueController extends MetricaBaseController {

    const ENTITY = '\\MetricaAsterisk\\Entity\\MetricsQueue';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    public function getEm() {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    /**
     * 
     * @return  \MetricaAsterisk\Repository\MetricaQueueRepository
     */
    public function getMetricsQueueRepository() {

        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function anualAction() {
           parent::anualAction();

        //OBTENGO REGISTROS
        $registros = $this->getMetricsQueueRepository()->getMetrica($this->getInicio(), $this->getFin(), "%Y-%m");

        #@toReview
        if (!count($registros)) {
            return $this->forward()->dispatch(\MetricaAsterisk\Controller\MetricaAtencionController::class, ['action' => "sin-registros"]);
        }

        $this->procesarRegistros($registros);

        return ["form" => $this->getForm(), 'metrica' => $this->getMetrica()];
    }

    public function mensualAction() {
        parent::mensualAction();

        //OBTENGO REGISTROS
        $registros = $this->getMetricsQueueRepository()->getMetrica($this->getInicio(), $this->getFin(), "%Y-%m-%d");

        #@toReview
        if (!count($registros)) {
            return $this->forward()->dispatch(\MetricaAsterisk\Controller\MetricaAtencionController::class, ['action' => "sin-registros"]);
        }

        $this->procesarRegistros($registros);

        return ["form" => $this->getForm(), 'metrica' => $this->getMetrica()];
    }

    public function diarioAction() {
        parent::diarioAction();

        //OBTENGO REGISTROS
        $registros = $this->getMetricsQueueRepository()->getMetrica($this->getInicio(), $this->getFin(), "%Y-%m-%d %H");

        #@toReview
        if (!count($registros)) {
            return $this->forward()->dispatch(\MetricaAsterisk\Controller\MetricaAtencionController::class, ['action' => "sin-registros"]);
        }

        $this->procesarRegistros($registros);


        return ["form" => $this->getForm(), 'metrica' => $this->getMetrica()];
    }

    protected function procesarRegistros($registros) {
        foreach ($registros as $r) {
            $this->getMetrica()->obtenerCrearTipo("queue")
                    ->obtenerCrearObjeto($r->queue)
                    ->obtenerCrearEstado("Recibidas")
                    ->obtenerCrearFecha($r->fecha, $r->received);

            $this->getMetrica()->obtenerCrearTipo("queue")
                    ->obtenerCrearObjeto($r->queue)
                    ->obtenerCrearEstado("Atendidas")
                    ->obtenerCrearFecha($r->fecha, $r->attended);

            $this->getMetrica()->obtenerCrearTipo("queue")
                    ->obtenerCrearObjeto($r->queue)
                    ->obtenerCrearEstado("Rechazadas")
                    ->obtenerCrearFecha($r->fecha, $r->rejected);

            $this->getMetrica()->obtenerCrearTipo("queue")
                    ->obtenerCrearObjeto($r->queue)
                    ->obtenerCrearEstado("Abandonadas")
                    ->obtenerCrearFecha($r->fecha, $r->abandoned);


            $this->getMetrica()->obtenerCrearTipo("queue")
                    ->obtenerCrearObjeto($r->queue)
                    ->obtenerCrearEstado("AbandonadasSL");
                  //  ->obtenerCrearFecha($r->fecha, 1);

            $this->getMetrica()->obtenerCrearTipo("queue")
                    ->obtenerCrearObjeto($r->queue)
                    ->obtenerCrearEstado("Tiempo de Espera");
                //    ->obtenerCrearFecha($r->fecha, 0);


            $this->getMetrica()->obtenerCrearTipo("queue")
                    ->obtenerCrearObjeto($r->queue)
                    ->obtenerCrearEstado("Tiempo de Conversacion");
                 //   ->obtenerCrearFecha($r->fecha, 0);


            $this->getMetrica()->obtenerCrearTipo("queue")
                    ->obtenerCrearObjeto($r->queue)
                    ->obtenerCrearEstado("Atención");
                //    ->obtenerCrearFecha($r->fecha, 0);

            $this->getMetrica()->obtenerCrearTipo("queue")
                    ->obtenerCrearObjeto($r->queue)
                    ->obtenerCrearEstado("ServiceLevel");
                //    ->obtenerCrearFecha($r->fecha, 0);
        }
    }

    public function detalladoAction() {
        return [];
    }

}
