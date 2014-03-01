<?php

namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;

class ProductoTable {
    
    private $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll(){
        return $this->tableGateway->select();
    }
    
    public function guardar(\Admin\Model\Producto $producto) {
        $this->tableGateway->insert($producto->toArray());
    }
    
}