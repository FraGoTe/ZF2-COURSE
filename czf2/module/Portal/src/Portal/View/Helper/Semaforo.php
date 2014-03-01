<?php

namespace Portal\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Semaforo extends AbstractHelper{
    
    
    public function __invoke($n=null) {
        if(is_null($n)){
            throw new Exception('Helper semaforo espera un valor');
        }
        
        $html = '<div style="border: 1px %s solid; width: 100; height: 20;">%s</div>';
        
        $color = 'red';
        if($n>0 && $n<33){$color = 'red';}
        if($n>34 && $n<66){$color = 'yellow';}
        if($n>67 && $n<100){$color = 'green';}
        
        return sprintf($html,$color,$n);
    }
    
}
