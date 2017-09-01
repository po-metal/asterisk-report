<?php

namespace Application\Form;

use Zend\Form\Form;

class Mes extends Form {

    public function __construct() {       
        parent::__construct('mes');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', "form");
        $this->setAttribute('role', "form");

        $this->add(array(
            'name' => 'mes',
            'type' => 'select',
            'options' => array(
                'label' => 'Type',
                'empty_option' => 'Select',
                'value_options' => array(
                    '01' => 'Enero',
                    '02' => 'Febrero',
                    '03' => 'Marzo',
                    '04' => 'Abril',
                    '05' => 'Mayo',
                    '06' => 'Junio',
                    '07' => 'Julio',
                    '08' => 'Agosto',
                    '09' => 'Septiembre',
                    '10' => 'Octubre',
                    '11' => 'Noviembre',
                    '12' => 'Diciembre',
                ),
            ),
            'attributes'=>array(
                'value' => date('m'),
                'class' => 'form-control input-lg',
            )
        ));
        
           $this->add(array(
            'name' => 'anio',
            'attributes' => array(
                'type' => 'text',
                'value' => date('Y')
            ),
            'options' => array(
                'label' => 'Año',
            )
        ));
        
        
        //PUT YOUR ELEMENTS
    
       
        
        //BASE
        
        
        //$this->addCsrf(); //Optional security
        
        $this->addSubmit("Enviar");
    }

    protected function addSubmit($value = "submit") {

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => $value,
                'class' => 'btn btn-lg btn-primary btn-block signup-btn',
            )
        ));
    }

    protected function addCsrf() {
        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf'
        ));
    }

}
