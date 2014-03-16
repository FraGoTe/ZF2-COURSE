<?php

namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class VentaTable {
    
    private $tableGateway;
    private $sl;
    
    public function __construct(TableGateway $tableGateway,$sl) {
        $this->tableGateway = $tableGateway;
        $this->sl = $sl;
    }
    
    public function fetchAll(){
        return $this->tableGateway->select();
    }
    
    /**
     * 
     * @param \Admin\Model\Venta $venta
     * @param type $detalles
     */
    public function registrarVenta(\Admin\Model\Venta $venta, $detalles) {
        $adapter = $this->tableGateway->getAdapter();
        
        try {
            $adapter->getDriver()->getConnection()->beginTransaction();

            $dataVenta = $venta->toArray();
            unset($dataVenta['id']);
            $dataVenta['fecha'] = date('Y-m-d H:i:s');
            $this->tableGateway->insert($dataVenta);
            $idVenta = $this->tableGateway->getLastInsertValue();
            
            $ventaDetalleTable = $this->sl->get('Admin\Model\VentaDetalleTable');
            foreach ($detalles as $value) {
                $value['id_venta'] = $idVenta;
                unset($value['enviar']);
                $ventaDetalleTable->getTableGateway()->insert($value);
            }
            
            $adapter->getDriver()->getConnection()->commit();
        } catch (Exception $exc) {
            $adapter->getDriver()->getConnection()->rollback();
            echo $exc->getMessage();exit;
        }

        var_dump($venta);
        var_dump($detalles);
        exit;
        
    }
    
}