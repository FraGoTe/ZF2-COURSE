<?php

namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;

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
    
}