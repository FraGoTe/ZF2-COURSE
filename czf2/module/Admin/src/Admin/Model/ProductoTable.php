<?php

namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class ProductoTable {
    
    private $tableGateway;
    private $sl;
    
    public function __construct(TableGateway $tableGateway, $sl) {
        $this->tableGateway = $tableGateway;
        $this->sl = $sl;
    }
    
    public function fetchAll(){
        return $this->tableGateway->select();
    }
    
    public function guardar(\Admin\Model\Producto $producto) {
        
        $logger = $this->sl->get('Logger');
        
            $ret = $this->tableGateway->insert($producto->toArray());
            
            if($producto->esCaro()){
                $id = $this->tableGateway->getLastInsertValue();
                $logger->alert($id);
            }
            if(!$ret){
                $logger->alert('Error al grabar en DB');
            }
        
    }
    
    
     public function getCboData(){
        $data = $this->tableGateway->select(function (Select $select){
            $select->columns(array('id','nombre'));
            
        });
        $res = array();
        foreach ($data as $categoria) {
            $res[$categoria->getId()] = $categoria->getNombre();
        }
        return $res;
    }
   
}