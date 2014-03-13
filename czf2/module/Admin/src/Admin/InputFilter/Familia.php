<?php

namespace Admin\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class Familia extends InputFilter  {
    
    public function __construct() {
        
        $input = new Input('nombre');
        
        $v = new \Zend\Validator\StringLength(array('min'=>3,'max'=>20));
        $v->setMessage('Nombre muy corto! (Al menos %min% car.)',\Zend\Validator\StringLength::TOO_SHORT);
        $v->setMessage('Nombre muy largo! (Como mucho %max% car.)',\Zend\Validator\StringLength::TOO_LONG);
        $input->getValidatorChain()->attach($v);
        
        $f = new \Zend\Filter\StringTrim();
        $input->getFilterChain()->attach($f);
        
        $this->add($input);
    }
    
}
