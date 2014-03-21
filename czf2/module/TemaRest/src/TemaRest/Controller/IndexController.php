<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TemaRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
 
class IndexController extends AbstractRestfulController {

    public function getList() {
        $data = array();
        foreach(range(0,rand(3,8)) as $i){
            $data[] = array(
                'id' => $i,
                'name' => 'item '.$i,
            );
        }
        return array('data'=>$data);
    }

    public function get($id) {
        
    }
    
    public function create($data) {
        
    }
    
    public function update($id, $data) {
        
    }
    

    public function delete($id) {
        
    }
    
    
    
    
    
    
    
}
