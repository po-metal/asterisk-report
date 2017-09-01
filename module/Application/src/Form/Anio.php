<?php

namespace Application\Form;

use Zend\Form\Form;

class Anio extends Form {

    public function __construct() {
        parent::__construct('anual');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', "form");
        $this->setAttribute('role', "form");


        $this->add(array(
            'name' => 'anio',
            'attributes' => array(
                'type' => 'text',
                'value' => date('Y'),
                'class' => 'form-control input-lg',                
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
