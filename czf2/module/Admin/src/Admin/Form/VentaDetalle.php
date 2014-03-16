<?php

namespace Admin\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class VentaDetalle extends Form {
    
    public function __construct() {
        
        parent::__construct('categoria');
        
        $element = new Element\Select('id_producto');
        $element->setLabel('Producto');
        $this->add($element);
       
        $element = new Element\Text('cantidad');
        $element->setLabel('Cantidad');
        $this->add($element);
       
        $element = new Element\Submit('enviar');
        $element->setValue('Agregar');
        $this->add($element);
        
    }
    
}
