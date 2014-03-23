<?php

namespace TemaRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractRestfulController {

    /**
     * @tutorial curl http://local.czf2.com/tema-rest
     * @return \Zend\View\Model\JsonModel
     */
    public function getList() {
        return new JsonModel(array(
//            'method' => __NAMESPACE__,
//            'method' => __METHOD__,
//            'method' => __CLASS__,
//            'method' => __LINE__,
//            'method' => __FILE__,
            'method' => __FUNCTION__,
            'params' => func_get_args(),
        ));
    }

    /**
     * @tutorial curl http://local.czf2.com/tema-rest/8
     * @return \Zend\View\Model\JsonModel
     */
    public function get($id) {
        return new JsonModel(array(
            'method' => __FUNCTION__,
            'params' => func_get_args(),
        ));
    }
    
    /**
     * @tutorial curl -X POST -d "a=1&b=2" http://local.czf2.com/tema-rest
     * @return \Zend\View\Model\JsonModel
     */
    public function create($data) {
        return new JsonModel(array(
            'method' => __FUNCTION__,
            'params' => func_get_args(),
        ));
    }
    
    /**
     * @tutorial curl -X PUT -d "a=1&b=2" http://local.czf2.com/tema-rest/8
     * @return \Zend\View\Model\JsonModel
     */
    public function update($id, $data) {
        return new JsonModel(array(
            'method' => __FUNCTION__,
            'params' => func_get_args(),
        ));
    }
    
    /**
     * @tutorial curl -X DELETE http://local.czf2.com/tema-rest/8
     * @return \Zend\View\Model\JsonModel
     */
    public function delete($id) {
        return new JsonModel(array(
            'method' => __FUNCTION__,
            'params' => func_get_args(),
        ));
    }
    
    
    
    
    
    
    
}
