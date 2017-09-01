<?php

namespace MetricaAsterisk\Form;

use Zend\Form\Form;

class Anual extends \Zend\Form\Form {

    public function __construct() {
        parent::__construct('anual');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', "form-horizontal");
        $this->setAttribute('role', "form");


        $this->add(array(
            'name' => 'anio',
            'attributes' => array(
                'type' => 'text',
                'value' => date('Y'),
                'placeholder' => 'Año',
                'class' => 'form-control pull-right'
                
            )
        ));



        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            
            'attributes' => array(
                'value' => "Obtener",
                'class' => "btn btn-primary pull-left"
                
            )
        ));
    }

}
