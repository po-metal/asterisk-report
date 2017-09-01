<?php

namespace MetricaAsterisk\Metrica;

/**
 * Description of Metrica
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class Metrica {

    const RANGO_ANUAL = "anual";
    const RANGO_MENSUAL = "mensual";
    const RANGO_DIARIO = "diario";

    protected $rango;
    protected $inicio;
    protected $fin;
    protected $tipos = array();

    function getMeses() {
        for ($i = clone $this->inicio; $i < $this->fin; $i->modify('+1 month')) {
            $x[$i->format('Y-m')] = $i->format('m');
        }
        return $x;
    }

    function getDias() {
        for ($i = clone $this->inicio; $i < $this->fin; $i->modify('+1 day')) {
            $x[$i->format('Y-m-d')] = $i->format('d');
        }
        return $x;
    }

    function getHoras() {
        for ($i = clone $this->inicio; $i < $this->fin; $i->modify('+1 hour')) {
            $x[$i->format('Y-m-d H')] = $i->format('H');
        }
        return $x;
    }

    function getRango() {
        return $this->rango;
    }

    function getInicio() {
        return $this->inicio;
    }

    function getFin() {
        return $this->fin;
    }

    function getX() {
        switch ($this->rango) {
            case self::RANGO_ANUAL:
                return $this->getMeses();
                break;
            case self::RANGO_MENSUAL:
                return $this->getDias();
                break;
            case self::RANGO_DIARIO:
                return $this->getHoras();
                break;
            default:
                return $this->getMeses();
                break;
        }
    }

    function getZoom() {
        switch ($this->rango) {
            case self::RANGO_ANUAL:
                return "/mensual/";
                break;
            case self::RANGO_MENSUAL:
                return "/diario/";
                break;
            case self::RANGO_DIARIO:
                return "/detalle/";
                break;
            default:
                return "";
                break;
        }
    }

    function __construct($rango, $inicio, $fin) {
        $this->rango = $rango;
        $this->inicio = $inicio;
        $this->fin = $fin;
    }

    function getTipos() {
        return $this->tipos;
    }

    function setTipos(array $tipos) {
        $this->tipos = $tipos;
    }

    function agregarTipo(Tipo $tipo) {
        $this->tipos[$tipo->getId()] = $tipo;
        return $this->tipos[$tipo->getId()];
    }

    function obtenerTipo($id) {
        if (key_exists($id, $this->tipos)) {
            return $this->tipos[$id];
        } else {
            echo $id;
        }
        return null;
    }

    function obtenerCrearTipo($id) {
        if (key_exists($id, $this->tipos)) {
            return $this->tipos[$id];
        } else {
            return $this->agregarTipo(new Tipo($id, $this));
        }
    }

    function procesarRegistros($registros) {

        foreach ($registros as $r) {
            $this->obtenerCrearTipo($r->tipo)
                    ->obtenerCrearObjeto($r->objeto)
                    ->obtenerCrearEstado($r->estado)
                    ->obtenerCrearFecha($r->fecha, $r->cantidad);
        }
    }

}
