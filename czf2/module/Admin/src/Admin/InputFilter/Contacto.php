<?php

namespace Admin\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class Contacto extends InputFilter  {
    
    public function __construct() {
        
        $input = new Input('mensaje');

        $v = new \Zend\Validator\StringLength(array('min'=>3,'max'=>5));
        $input->getValidatorChain()->attach($v);
        $v = new \Zend\Validator\Callback(function($value){
            return $value!='NO VAYAN!';
        });
        $input->getValidatorChain()->attach($v);
        
        $this->add($input);

        $input = new Input('nombre');
        
        $v = new \Zend\Validator\StringLength(array('min'=>3,'max'=>20));
        $v->setMessage('Nombre muy corto! (Al menos %min% car.)',\Zend\Validator\StringLength::TOO_SHORT);
        $v->setMessage('Nombre muy largo! (Como mucho %max% car.)',\Zend\Validator\StringLength::TOO_LONG);
        $input->getValidatorChain()->attach($v);
        
        $f = new \Zend\Filter\StringToUpper();
        $input->getFilterChain()->attach($f);
        $f = new \Zend\Filter\StringTrim();
        $input->getFilterChain()->attach($f);
        $f = new \Zend\Filter\Word\SeparatorToDash();
        $input->getFilterChain()->attach($f);
        
        $this->add($input);
        
        
        
    }
    
}
