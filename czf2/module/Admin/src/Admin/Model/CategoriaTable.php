<?php

namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class CategoriaTable {
    
    private $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll(){
        return $this->tableGateway->select();
    }
    
    public function guardar(\Admin\Model\Categoria $categoria) {
        $data = array_merge($categoria->toArray(), array(
            'creado'=> date('Y-m-d H:i:s'),
            'activo'=> '1',
        ));
        $this->tableGateway->insert($data);
    }
    
    public function getCboData(){
        
        $data = $this->tableGateway->select(function (Select $select){
            $select->columns(array('id','nombre'));
            $select->where(array('activo=?'=>1));
            
        });
        
        $res = array();
        foreach ($data as $categoria) {
            $res[$categoria->getId()] = $categoria->getNombre();
        }
        return $res;
            
    }
    
}