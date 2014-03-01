<?php

namespace Admin\Validator;

use Zend\Validator\AbstractValidator;

class Ruc extends AbstractValidator {
    
    const INVALID = 'Invalid';

    protected $messageTemplates = array(
        self::INVALID   => "RUC no tiene Formato SUNAT"
    );
    
    
    /**
     * 
     * @param type $value
     * @return boolean
     */
    public function isValid($value) {
        if(strlen($value)!=11){
            $this->error(self::INVALID);
            return false;
        }
        
        $primeros = substr($value, 0, 2);
        if(!($primeros=='10' || $primeros=='20')){
            $this->error(self::INVALID);
            return false;
        }
        
        
        
        return true;
    }

}
