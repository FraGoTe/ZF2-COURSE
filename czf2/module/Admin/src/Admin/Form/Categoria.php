<?php

namespace Admin\Form;

use Zend\Form\Form;

class Categoria extends Form {
    
    public function __construct($name = null) {
        parent::__construct('categoria');
        
        $element = new \Zend\Form\Element\Text('nombre');
        $element->setLabel('Nombre');
        $this->add($element);
       
        $element = new \Zend\Form\Element\Submit('enviar');
        $this->add($element);
        
    }
    
}
