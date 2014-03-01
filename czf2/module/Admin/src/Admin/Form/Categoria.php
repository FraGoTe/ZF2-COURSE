<?php

namespace Admin\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Categoria extends Form {
    
    public function __construct($name = null) {
        parent::__construct('categoria');
        
        $element = new Element\Text('nombre');
        $element->setLabel('Nombre');
        $this->add($element);
       
        $element = new Element\Submit('enviar');
        $this->add($element);
        
    }
    
}
