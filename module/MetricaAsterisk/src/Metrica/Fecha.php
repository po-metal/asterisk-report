<?php

namespace MetricaAsterisk\Metrica;

/**
 * Description of Fecha
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class Fecha {

    protected $id;
    protected $estado;
    protected $cantidad;

    function __construct($id, $estado, $cantidad) {
        $this->id = $id;
        $this->estado = $estado;
        $this->cantidad = $cantidad;
    }
    
    function getEstado() {
        return $this->estado;
    }

    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
    function getPorcentaje(){
       return  number_format($this->cantidad * 100 / $this->getEstado()->getObjetoPadre()->getFecha($this->id), 0, ",", ".");
    }
    
    public function __toString() {
        return $this->cantidad;
    }


}
