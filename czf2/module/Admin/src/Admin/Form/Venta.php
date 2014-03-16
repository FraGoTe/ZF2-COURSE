<?php

namespace Admin\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Venta extends Form {
    
    public function __construct() {
        
        parent::__construct('categoria');
        
        $element = new Element\Text('ndoc');
        $element->setLabel('Documento');
        $this->add($element);
       
        $element = new Element\Text('ruc');
        $element->setLabel('Ruc');
        $this->add($element);
       
        $element = new Element\Submit('enviar');
        $element->setValue('Agregar');
        $this->add($element);
        
    }
    
}
