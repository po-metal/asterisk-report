<?php

namespace MetricaAsterisk\Metrica;

/**
 * Description of Element
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class Estado {

    protected $id;
    protected $objeto;
    protected $fechas = array();
    protected $total;

    function __construct($id, $objeto) {
        $this->id = $id;
        $this->objeto = $objeto;
    }

    function getObjeto() {
        return $this->objeto;
    }

    function getObjetoPadre() {
        return $this->objeto;
    }

    function getId() {
        return $this->id;
    }

    function getFechas() {
        return $this->fechas;
    }

    function setFechas($fechas) {
        $this->fechas = $fechas;
    }

    function agregarFecha(Fecha $fecha) {
        $this->fechas[$fecha->getId()] = $fecha;
        return $this->fechas[$fecha->getId()];
    }

    function obtenerFecha($id) {
        if (key_exists($id, $this->fechas)) {
            if (is_a($this->fechas[$id], \MetricaAsterisk\Metrica\Fecha::class)) {
                return $this->fechas[$id];
            }
        }
        return null;
    }

    function obtenerCrearFecha($id, $cantidad) {
        if (key_exists($id, $this->fechas)) {
            return $this->fechas[$id];
        } else {
            $this->total += $cantidad;
            $this->objeto->agregarCantidad($id, $cantidad);
            return $this->agregarFecha(new Fecha($id, $this, $cantidad));
        }
    }

    function getTotal() {
        return $this->total;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function getCantFechas() {
        return count($this->fechas);
    }

    function getPromedio() {

        return number_format($this->getTotal() / $this->getCantFechas(), 0, "", "");
    }

    function getPorcentajeVsPromedio($id) {
        if ($this->obtenerFecha($id)) {
            $porcentaje = $this->obtenerFecha($id)->getCantidad() * 100 / $this->getPromedio();
            return $porcentaje;
        }
        return null;
    }

    function getLevel($id) {
        $p = $this->getPorcentajeVsPromedio($id);

        if ($p > 150) {
            return 5;
        } else if ($p > 125) {
            return 4;
        } else if ($p > 90) {
            return 3;
        } else if ($p > 50) {
            return 2;
        } else {
            return 1;
        }
    }

    function getLevelClass($id) {
        switch ($this->getLevel($id)) {
            case 5:
                return "danger";
            case 4:
                return "warning";
            case 3:
                return "";
            case 2:
                return "";
            case 1:
                return "";
            default:
                return "";
        }
    }

    public function __toString() {
        return $this->id;
    }

}
