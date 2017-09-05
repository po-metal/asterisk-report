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
class MetricaAtencionQueueController extends AbstractActionController {

    const ENTITY = '\\Queues\\Entity\\Stats';

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

    public function getEntityRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function anualAction() {
        $form = new \MetricaAsterisk\Form\Anual();
    }

    public function mensualAction() {
        $anio = $this->params("anio");
        $mes = $this->params("mes");
    }

    public function diarioAction() {
        $anio = $this->params("anio");
        $mes = $this->params("mes");
        $dia = $this->params("dia");
        $form = new \MetricaAsterisk\Form\Diario();
        if (!$anio) {
            $anio = date('Y');
        }
        if (!$mes) {
            $mes = date('m');
        }
        if (!$dia) {
            $dia = date('d');
        }
        $form->get('anio')->setValue($anio);
        $form->get('mes')->setValue($mes);
        $form->get('dia')->setValue($dia);
    }

    public function detalladoAction() {
        return [];
    }

}
