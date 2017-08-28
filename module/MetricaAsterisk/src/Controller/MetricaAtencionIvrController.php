<?php

namespace MetricaAsterisk\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * MetricaAtencionIvrController
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class MetricaAtencionIvrController extends AbstractActionController {

    const ENTITY = '\\MetricaAsterisk\\Entity\\MetricaAtencion';

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
     * @return \MetricaAsterisk\Repository\MetricaAtencionRepository
     */
    public function getMetricaAtencionRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function getEntityRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function mainAction() {
        return [];
    }

    public function anualAction() {
        $form = new \MetricaAsterisk\Form\Anual();

        $anio = $this->params("anio");
        if (!$anio) {
            $anio = date('Y');
        }
        $form->get('anio')->setValue($anio);

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $anio = $this->getRequest()->getPost('anio');
            }
        }

        //CALCULO INICIO-FIN
        $inicio = new \DateTime($anio . "-01-01");
        $fin = clone $inicio;
        $fin->modify("+1 year");

        //OBTENGO REGISTROS
        $registros = $this->getMetricaAtencionRepository()->getMetrica($inicio, $fin, "%Y-%m");

        if (!count($registros)) {
            return $this->forward()->dispatch(\MetricaAsterisk\Controller\MetricaAtencionController::class, ['action' => "sin-registros"]);
        }

        //POPULO METRICA
        $metrica = new \MetricaAsterisk\Metrica\Metrica(\MetricaAsterisk\Metrica\Metrica::RANGO_ANUAL, $inicio, $fin);
        $metrica->procesarRegistros($registros);

        return ["form" => $form, 'anio' => $anio, 'metrica' => $metrica];
    }

    public function mensualAction() {
        $anio = $this->params("anio");
        $mes = $this->params("mes");

        $form = new \MetricaAsterisk\Form\Mensual();

        if (!$anio) {
            $anio = date('Y');
        }
        if (!$mes) {
            $mes = date('m');
        }
        $form->get('anio')->setValue($anio);
        $form->get('mes')->setValue($mes);


        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $anio = $this->getRequest()->getPost('anio');
                $mes = $this->getRequest()->getPost('mes');
            }
        }

        //CALCULO INICIO-FIN
        $inicio = new \DateTime($anio . "-" . $mes . "-01");
        $fin = clone $inicio;
        $fin->modify("+1 month");


        //OBTENGO REGISTROS
        $registros = $this->getMetricaAtencionRepository()->getMetrica($inicio, $fin, "%Y-%m-%d");

        if (!count($registros)) {
            return $this->forward()->dispatch(\MetricaAsterisk\Controller\MetricaAtencionController::class, ['action' => "sin-registros"]);
        }

        //POPULO METRICA
        $metrica = new \MetricaAsterisk\Metrica\Metrica(\MetricaAsterisk\Metrica\Metrica::RANGO_MENSUAL, $inicio, $fin);
        $metrica->procesarRegistros($registros);

        return ["form" => $form, 'anio' => $anio, 'metrica' => $metrica];
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


        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $anio = $this->getRequest()->getPost('anio');
                $mes = $this->getRequest()->getPost('mes');
                $dia = $this->getRequest()->getPost('dia');
            }
        }

        //CALCULO INICIO-FIN
        $inicio = new \DateTime($anio . "-" . $mes . "-" . $dia);
        $fin = clone $inicio;
        $fin->modify("+1 day");


        //OBTENGO REGISTROS
        $registros = $this->getMetricaAtencionRepository()->getMetrica($inicio, $fin, "%Y-%m-%d %H");

        if (!count($registros)) {
            return $this->forward()->dispatch(\MetricaAsterisk\Controller\MetricaAtencionController::class, ['action' => "sin-registros"]);
        }

        //POPULO METRICA
        $metrica = new \MetricaAsterisk\Metrica\Metrica(\MetricaAsterisk\Metrica\Metrica::RANGO_DIARIO, $inicio, $fin);
        $metrica->procesarRegistros($registros);

        return ["form" => $form, 'metrica' => $metrica];
    }

    public function detalleAction() {
        return [];
    }

    public function detalladoAction() {
        return [];
    }

}
