<?php

namespace MetricaAsterisk\Helper\View;

/**
 * TiposDestino
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class TiposDestino extends \Zend\View\Helper\AbstractHelper
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;
    
    protected $collection = null;
    
    function getEm() {
        return $this->em;
    }

    
    public function __invoke()
    {   
        $this->collection = $this->getEm()->getRepository("MetricaAsterisk\Entity\TipoDestino")->obtenerPorPrioridad();
        return $this;
    }
    
    public function getAll(){
        return $this->collection;
    }
    
    public function getByName($name){
        foreach($this->collection as $tipoDestino){
            if($name == $tipoDestino->getNombre()){
                return $tipoDestino;
            }
        }
        return null;
    }

    public function __construct($em)
    {
        $this->em = $em;
    }


}

