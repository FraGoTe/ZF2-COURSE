<?php

namespace Admin\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class VentaDetalle extends InputFilter  {
    
    public function __construct() {
        $input = new Input('cantidad');
        $v = new \Zend\Validator\Digits();
        $input->getValidatorChain()->attach($v);
        $this->add($input);
    }
    
}
