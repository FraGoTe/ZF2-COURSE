<?php

namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class FamiliaTable {
    
    private $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll(){
        return $this->tableGateway->select();
    }
    
    public function guardar(\Admin\Model\Familia $familia) {
        $this->tableGateway->insert($familia->toArray());
    }
    
    public function getCboData(){
        
        $data = $this->tableGateway->select(function (Select $select){
            $select->columns(array('id','nombre'));
            $select->where('id_padre IS NULL');
            
        });
        
        $res = array();
        foreach ($data as $familia) {
            $res[$familia->getId()] = $familia->getNombre();
        }
        return $res;
            
    }
    
    public function getCboDataHijas($id){
        
        $data = $this->tableGateway->select(function (Select $select) use ($id) {
            $select->columns(array('id','nombre'));
            $select->where(array('id_padre=?'=>$id));
        });
        
        $res = array();
        foreach ($data as $familia) {
            $res[$familia->getId()] = $familia->getNombre();
        }
        return $res;
            
    }
    
}