<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MetricaAsterisk\Metrica;

/**
 * Description of Tipo
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class Tipo {

    protected $id;
    protected $metrica;
    protected $objetos = array();

    function __construct($id,$metrica) {
        $this->id = $id;
        $this->metrica = $metrica;
    }
    
    function getMetrica() {
        return $this->metrica;
    }

    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getObjetos() {
        return $this->objetos;
    }

    function setObjetos(array $objetos) {
        $this->objetos = $objetos;
    }

    function agregarObjeto(Objeto $objeto) {
        $this->objetos[$objeto->getId()] = $objeto;
        return $this->objetos[$objeto->getId()];
    }

    function obtenerObjeto($id) {
        if (key_exists($id, $this->objetos)) {
            return $this->objetos[$id];
        }
        return null;
    }

    function obtenerCrearObjeto($id) {
        if (key_exists($id, $this->objetos)) {
            return $this->objetos[$id];
        } else {
            return $this->agregarObjeto(new Objeto($id,$this));
        }
    }

}
