<?php

namespace Admin\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Familia extends Form {
    
    public function __construct($name = null) {
        parent::__construct('categoria');
        
        $element = new Element\Select('fam1');
        $element->setLabel('Nombre');
        $element->setAttribute('id', 'fam1');
        $this->add($element);
       
        $element = new Element\Submit('enviar');
        $element->setValue('Agregar');
        $this->add($element);
        
    }
    
        
    public function setFamilias($data){
        $this->get('fam1')->setValueOptions(array_merge(array('-1'=>'-- Escoje --'),$data));
    }
    

    
}
