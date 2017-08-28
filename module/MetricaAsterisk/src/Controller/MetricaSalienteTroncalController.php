<?php

namespace MetricaAsterisk\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * MetricaSalienteTroncalController
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class MetricaSalienteTroncalController extends AbstractActionController
{

    const ENTITY = '\\MetricaAsterisk\\Entity\\MetricaSalientes';

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

      public function getMetricaSalienteRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }


    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
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


        $tiposDestino = $this->getEm()->getRepository("MetricaAsterisk\Entity\TipoDestino")->obtenerPorPrioridad();
        $troncales = $this->getEm()->getRepository("MetricaAsterisk\Entity\Troncal")->findAll();



        //OBTENGO REGISTROS
        $registros = $this->getMetricaSalienteRepository()->getMetricaPorTroncal($inicio, $fin, "%Y-%m");

        if (!count($registros)) {
            return $this->forward()->dispatch(\MetricaAsterisk\Controller\MetricaAtencionController::class, ['action' => "sin-registros"]);
        }

        //POPULO METRICA
        $metrica = new \MetricaAsterisk\Metrica\Metrica(\MetricaAsterisk\Metrica\Metrica::RANGO_ANUAL, $inicio, $fin);
        foreach ($registros as $r) {

            $metrica->obtenerCrearTipo("troncal")
                    ->obtenerCrearObjeto($r->troncal)
                    ->obtenerCrearObjeto($r->tipo_destino)
                    ->obtenerCrearEstado($r->estado)
                    ->obtenerCrearFecha($r->fecha, $r->cantidad);
        }

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


         $tiposDestino = $this->getEm()->getRepository("MetricaAsterisk\Entity\TipoDestino")->obtenerPorPrioridad();
        $troncales = $this->getEm()->getRepository("MetricaAsterisk\Entity\Troncal")->findAll();



        //OBTENGO REGISTROS
        $registros = $this->getMetricaSalienteRepository()->getMetricaPorTroncal($inicio, $fin, "%Y-%m-%d");

        if (!count($registros)) {
            return $this->forward()->dispatch(\MetricaAsterisk\Controller\MetricaAtencionController::class, ['action' => "sin-registros"]);
        }

        //POPULO METRICA
        $metrica = new \MetricaAsterisk\Metrica\Metrica(\MetricaAsterisk\Metrica\Metrica::RANGO_MENSUAL, $inicio, $fin);
        foreach ($registros as $r) {

            $metrica->obtenerCrearTipo("troncal")
                    ->obtenerCrearObjeto($r->troncal)
                    ->obtenerCrearObjeto($r->tipo_destino)
                    ->obtenerCrearEstado($r->estado)
                    ->obtenerCrearFecha($r->fecha, $r->cantidad);
        }

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


         $tiposDestino = $this->getEm()->getRepository("MetricaAsterisk\Entity\TipoDestino")->obtenerPorPrioridad();
        $troncales = $this->getEm()->getRepository("MetricaAsterisk\Entity\Troncal")->findAll();



        //OBTENGO REGISTROS
        $registros = $this->getMetricaSalienteRepository()->getMetricaPorTroncal($inicio, $fin, "%Y-%m-%d %H");

        if (!count($registros)) {
            return $this->forward()->dispatch(\MetricaAsterisk\Controller\MetricaAtencionController::class, ['action' => "sin-registros"]);
        }

        //POPULO METRICA
        $metrica = new \MetricaAsterisk\Metrica\Metrica(\MetricaAsterisk\Metrica\Metrica::RANGO_DIARIO, $inicio, $fin);
        foreach ($registros as $r) {

            $metrica->obtenerCrearTipo("troncal")
                    ->obtenerCrearObjeto($r->troncal)
                    ->obtenerCrearObjeto($r->tipo_destino)
                    ->obtenerCrearEstado($r->estado)
                    ->obtenerCrearFecha($r->fecha, $r->cantidad);
        }

        return ["form" => $form, 'anio' => $anio, 'metrica' => $metrica];
    }

    public function detalladoAction()
    {
        return [];
    }


}

