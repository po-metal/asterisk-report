<?php

namespace Application\Form;

use Zend\Form\Form;

class Dia extends Form {

    public function __construct() {
        parent::__construct('Fecha');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', "form");
        $this->setAttribute('role', "form");

        //PUT YOUR ELEMENTS

        $this->add(array(
            'name' => 'fecha',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'required' => false,
                'value' => date('Y-m-d'),
                'class' => 'form-control input-lg',
                'required' => 'required',
                'data-date-format' => 'YYYY-MM-DD',
            ),
            'options' => array(
                'label' => 'fecha',
                'description' => 'Fecha formato YYYY-MM-    DD'
            )
        ));

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
