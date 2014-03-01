<?php

namespace Admin\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class Producto extends InputFilter  {
    
    public function __construct() {
        
        $input = new Input('nombre');
        
        $v = new \Zend\Validator\StringLength(array('min'=>3,'max'=>30));
        $input->getValidatorChain()->attach($v);
        
        $f = new \Zend\Filter\StringTrim();
        $input->getFilterChain()->attach($f);
        
        $this->add($input);
        
        
    }
    
}
