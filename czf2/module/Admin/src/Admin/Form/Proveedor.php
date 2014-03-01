<?php

namespace Admin\Form;

use Zend\Form\Form;

class Proveedor extends Form {
    
    public function __construct($name = null) {
        parent::__construct('proveedor');
        
        $element = new \Zend\Form\Element\Text('nombre');
        $element->setLabel('Nombre');
        $this->add($element);
       
        $element = new \Zend\Form\Element\Text('ruc');
        $element->setLabel('RUC');
        $this->add($element);
       
        $element = new \Zend\Form\Element\Email('email');
//        $element = new \Zend\Form\Element\Date('email');
        $element->setLabel('E-Mail');
        $this->add($element);
       
        $element = new \Zend\Form\Element\Submit('enviar');
        $this->add($element);
        
    }
    
}
