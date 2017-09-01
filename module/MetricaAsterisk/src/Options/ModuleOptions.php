<?php

namespace MetricaAsterisk\Options;

/**
 * ModuleOptions
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class ModuleOptions extends \Zend\Stdlib\AbstractOptions
{

    private $coloresPorEstado = '';

    public function getColoresPorEstado()
    {
        return $this->coloresPorEstado;
    }

    public function setColoresPorEstado($coloresPorEstado)
    {
        $this->coloresPorEstado= $coloresPorEstado;
    }


}

