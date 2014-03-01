<?php

namespace Admin\Form;

use Zend\Form\Form;

class Producto extends Form {
    
    public function __construct($name = null) {
        parent::__construct('proveedor');
        
        $element = new \Zend\Form\Element\Text('nombre');
        $element->setLabel('Nombre');
        $this->add($element);
       
        $element = new \Zend\Form\Element\Select('categoria_id');
        $element->setLabel('Categoria');
        $this->add($element);
       
        $element = new \Zend\Form\Element\Select('proveedor_id');
        $element->setLabel('Proveedor');
        $this->add($element);
       
        $element = new \Zend\Form\Element\Text('precio_compra');
//        $element->setAttribute('step', 'any');
//        $element->setAttribute('max', '9999');
//        $element->setAttribute('min', '0');
        $element->setLabel('P. Compra');
        $this->add($element);
       
        $element = new \Zend\Form\Element\Text('precio_venta');
//        $element->setAttribute('step', 'any');
//        $element->setAttribute('max', '9999');
//        $element->setAttribute('min', '0');
        $element->setLabel('P. Venta');
        $this->add($element);
       
       
        $element = new \Zend\Form\Element\Submit('enviar');
        $element->setValue('Guardar');
        $this->add($element);
        
    }
    
    public function setCategorias($data){
        $this->get('categoria_id')->setValueOptions($data);
    }
    
    public function setProveedores($data){
        $this->get('proveedor_id')->setValueOptions($data);
    }
    
}
