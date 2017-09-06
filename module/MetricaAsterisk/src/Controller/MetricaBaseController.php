<?php

namespace MetricaAsterisk\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * MetricaBaseController
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class MetricaBaseController extends AbstractActionController {

    protected $anio;
    protected $mes;
    protected $dia;
    protected $form;
    protected $inicio;
    protected $fin;
    protected $metrica;

    public function anualAction() {
        $this->setAnio($this->params("anio"));

        $this->form = new \MetricaAsterisk\Form\Anual();

        $this->form->get('anio')->setValue($this->getAnio());


        if ($this->getRequest()->isPost()) {
            $this->form->setData($this->getRequest()->getPost());
            if ($this->form->isValid()) {
                $this->setAnio($this->form->get('anio')->getValue());
            }
        }
        //CALCULO INICIO-FIN
        $this->inicio = new \DateTime($this->getAnio() . "-01-01");
        $this->fin = clone $this->inicio;
        $this->fin->modify("+1 year");

        //POPULO METRICA
        $this->metrica = new \MetricaAsterisk\Metrica\Metrica(\MetricaAsterisk\Metrica\Metrica::RANGO_ANUAL, $this->getInicio(), $this->getFin());
    }

    public function mensualAction() {
        $this->setAnio($this->params("anio"));
        $this->setMes($this->params("mes"));
        $this->form = new \MetricaAsterisk\Form\Mensual();

        $this->form->get('anio')->setValue($this->getAnio());
        $this->form->get('mes')->setValue($this->getMes());


        if ($this->getRequest()->isPost()) {
            $this->form->setData($this->getRequest()->getPost());
            if ($this->form->isValid()) {
                $this->setAnio($this->form->get('anio')->getValue());
                $this->setMes($this->form->get('mes')->getValue());
            }
        }
        //CALCULO INICIO-FIN
        $this->inicio = new \DateTime($this->getAnio() . "-" . $this->getMes() . "-01");
        $this->fin = clone $this->inicio;
        $this->fin->modify("+1 month");

        //POPULO METRICA
        $this->metrica = new \MetricaAsterisk\Metrica\Metrica(\MetricaAsterisk\Metrica\Metrica::RANGO_MENSUAL, $this->getInicio(), $this->getFin());
    }

    public function diarioAction() {
        $this->setAnio($this->params("anio"));
        $this->setMes($this->params("mes"));
        $this->setDia($this->params("dia"));
        $this->form = new \MetricaAsterisk\Form\Diario();

        $this->form->get('anio')->setValue($this->getAnio());
        $this->form->get('mes')->setValue($this->getMes());
        $this->form->get('dia')->setValue($this->getDia());

        if ($this->getRequest()->isPost()) {
            $this->form->setData($this->getRequest()->getPost());
            if ($this->form->isValid()) {
                $this->setAnio($this->form->get('anio')->getValue());
                $this->setMes($this->form->get('mes')->getValue());
                $this->setDia($this->form->get('dia')->getValue());
            }
        }
        //CALCULO INICIO-FIN
        $this->inicio = new \DateTime($this->getAnio() . "-" . $this->getMes() . "-" . $this->getDia());
        $this->fin = clone $this->inicio;
        $this->fin->modify("+1 day");


        //POPULO METRICA
        $this->metrica = new \MetricaAsterisk\Metrica\Metrica(\MetricaAsterisk\Metrica\Metrica::RANGO_DIARIO, $this->getInicio(), $this->getFin());
    }

    public function detalladoAction() {
        return [];
    }

    function getAnio() {
        return $this->anio;
    }

    function getMes() {
        return $this->mes;
    }

    function getDia() {
        return $this->dia;
    }

    function setAnio($anio) {
        if (!$anio) {
            $this->anio = date('Y');
        } else {
            $this->anio = $anio;
        }
    }

    function setMes($mes) {
        if (!$mes) {
            $this->mes = date('m');
        } else {
            $this->mes = $mes;
        }
    }

    function setDia($dia) {
        if (!$dia) {
            $this->dia = date('d');
        } else {
            $this->dia = $dia;
        }
    }

    function getForm() {
        return $this->form;
    }

    function setForm($form) {
        $this->form = $form;
    }

    function getInicio() {
        return $this->inicio;
    }

    function getFin() {
        return $this->fin;
    }

    function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    function setFin($fin) {
        $this->fin = $fin;
    }

    function getMetrica() {
        return $this->metrica;
    }

    function setMetrica($metrica) {
        $this->metrica = $metrica;
    }

}
