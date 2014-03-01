<?php

namespace Admin\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Admin\Validator\Ruc;

class Proveedor extends InputFilter  {
    
    public function __construct($max) {
        
        $input = new Input('nombre');
        
        $v = new \Zend\Validator\StringLength(array('min'=>3,'max'=>$max));
        $v->setMessage('Nombre muy corto! (Al menos %min% car.)',\Zend\Validator\StringLength::TOO_SHORT);
        $v->setMessage('Nombre muy largo! (Como mucho %max% car.)',\Zend\Validator\StringLength::TOO_LONG);
        $input->getValidatorChain()->attach($v);
        
        $f = new \Zend\Filter\StringTrim();
        $input->getFilterChain()->attach($f);
        
        $this->add($input);
        
        
        
        $input = new Input('ruc');
        
        $v = new \Zend\Validator\StringLength(array('min'=>11,'max'=>11));
        $v->setMessage('El RUC debe tener %min% car.)',\Zend\Validator\StringLength::TOO_SHORT);
        $v->setMessage('El RUC debe tener %min% car.)',\Zend\Validator\StringLength::TOO_LONG);
        $input->getValidatorChain()->attach($v);
        $v = new \Zend\Validator\Callback(function($value){
            $dosPrimeros = substr($value, 0, 2);
            return ($dosPrimeros=='10'||$dosPrimeros=='20');
        });
        $input->getValidatorChain()->attach($v);
        
        $v = new Ruc();
        $input->getValidatorChain()->attach($v);
        
        $f = new \Zend\Filter\StringTrim();
        $input->getFilterChain()->attach($f);
        
        $this->add($input);
    }
    
}
