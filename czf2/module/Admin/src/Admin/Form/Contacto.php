<?php

namespace Admin\Form;

use Zend\Form\Form;

class Contacto extends Form {
    
    public function __construct($name = null) {
        parent::__construct('contacto');
        
        $element = new \Zend\Form\Element\Text('nombre');
        $element->setLabel('Nombre');
        $this->add($element);
        
        $element = new \Zend\Form\Element\Textarea('mensaje');
        $element->setLabel('Mensaje');
        $this->add($element);
        
        $element = new \Zend\Form\Element\Submit('enviar');
        $element->setValue('Enviar');
        $this->add($element);
        
        
        
    }
    
}
