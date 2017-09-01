<?php

namespace MetricaAsterisk\Metrica;

/**
 * Description of Objeto
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class Objeto {

    const CHARTJS_CANVAS_ID = "CHART_";
    const CHARTJS_PIE_CANVAS_ID = "CHART_PIE";
    const CHARTJS_DATA_VAR = "data_";

    protected $id;
    protected $tipo;
    protected $estados = array();
    protected $objetos = array();
    protected $objetoPadre = null;
    protected $fechas = array();
    protected $total;

    function __construct($id, $tipo) {
        $this->id = $id;
        $this->tipo = $tipo;
    }
    
    function esHijo(){
        if($this->objetoPadre == null){
            return false;
        }else{
            return true;
        }
    }
    
    function tieneHijos(){
        if(count($this->objetos)){
            return true;
        }else{
            return false;
        }
    }

    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getFechas() {
        return $this->fechas;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getEstados() {
        return $this->estados;
    }

    function setEstados($estados) {
        $this->estados = $estados;
    }

    function agregarEstado(Estado $estado) {
        $this->estados[$estado->getId()] = $estado;
        return $this->estados[$estado->getId()];
    }

    function obtenerEstado($id) {
        if (key_exists($id, $this->estados)) {
            return $this->estados[$id];
        }
        return null;
    }

    function obtenerCrearEstado($id) {
        if (key_exists($id, $this->estados)) {
            return $this->estados[$id];
        } else {
            return $this->agregarEstado(new Estado($id, $this));
        }
    }

    function getTotal() {
        return $this->total;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function agregarCantidad($idFecha, $cantidad) {
        $this->total += $cantidad;
        if (!key_exists($idFecha, $this->fechas)) {
            $this->fechas[$idFecha] = 0;
        }
        $this->fechas[$idFecha] += $cantidad;
    }

    function getFecha($idFecha) {
        if (key_exists($idFecha, $this->fechas)) {
            return $this->fechas[$idFecha];
        }
        return null;
    }

    public function __toString() {
        return $this->id;
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

    public function getChartJsPieData($coloresPorEstado) {
        $u = 0;
        $datasets = array();
        foreach ($this->getEstados() as $estado) {
            $labels[] = $estado->getId();
            $datasets['backgroundColor'][$u] = $coloresPorEstado[$estado->getId()]['backgroundColor'];
            $datasets['data'][$u] = $estado->getTotal();
            $datasets['label'] = "Totales";
            $u++;
        }    
        $data = [
            'datasets' => [$datasets],
              'labels' => $labels
        ];
        $zendJson = new \Zend\Json\Json();
        return $zendJson->encode($data, null, ['prettyPrint' => true]);
    }

    public function getChartJsData($coloresPorEstado) {
        $u = 0;
        $datasets = array();
        foreach ($this->getEstados() as $estado) {
            $datasets[$u]['label'] = $estado->getId();
            $datasets[$u]['borderColor'] = $coloresPorEstado[$estado->getId()]['borderColor'];
            $datasets[$u]['backgroundColor'] = $coloresPorEstado[$estado->getId()]['backgroundColor'];
            foreach ($this->getTipo()->getMetrica()->getX() as $k => $x) {
                if ($estado->obtenerFecha($k)) {
                    $datasets[$u]['data'][] = $estado->obtenerFecha($k)->getCantidad();
                } else {
                    $datasets[$u]['data'][] = null;
                }
            }
            $u++;
        }

        $data = [
            'labels' => $this->getChartJsEjeX(),
            'datasets' => $datasets
        ];

        $zendJson = new \Zend\Json\Json();
        return $zendJson->encode($data, null, ['prettyPrint' => true]);
    }

    public function getChartJsEjeX() {
        foreach ($this->getTipo()->getMetrica()->getX() as $k => $x) {
            $ejex[] = $x;
        }
        return $ejex;
    }

    public function getChartJsCanvasId() {
        return self::CHARTJS_CANVAS_ID . str_replace(" ", "", $this->getId());
    }

    public function getChartJsPieCanvasId() {
        return self::CHARTJS_PIE_CANVAS_ID . str_replace(" ", "", $this->getId());
    }

    public function getChartJsId() {
        return str_replace(" ", "", $this->getId());
    }

    public function getChartJsDataVar() {
        return self::CHARTJS_DATA_VAR . str_replace(" ", "", $this->getId());
    }

    public function getChartJsOptions($stacked = true, $datasetFill = true) {
        $options = [
            'responsive' => true,
            'maintainAspectRatio' => true,
            'elements' => [
                'line' => [
                    'fill' => $datasetFill
                ]
            ],
            'title' => [
                'display' => false,
                'text' => ''
            ],
            'tooltips' => [
                'mode' => 'index',
            ],
            'hover' => [
                'mode' => 'index'
            ],
            'scales' => [
                'xAxes' => [[
                'scaleLabel' => [
                    'display' => true,
                    'labelString' => $this->getTipo()->getMetrica()->getRango()
                ]]
                ],
                'yAxes' => [[
                'stacked' => $stacked,
                'scaleLabel' => [
                    'display' => true,
                    'labelString' => 'Value'
                ]]
                ]
            ]
        ];
        $zendJson = new \Zend\Json\Json();
        return $zendJson->encode($options, null, ['prettyPrint' => true]);
    }

}
