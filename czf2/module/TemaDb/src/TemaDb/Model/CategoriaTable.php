<?php

namespace TemaDb\Model;

use Zend\Db\TableGateway\TableGateway;

class CategoriaTable {
    
    private $tableGateway;
    
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function getAlertList($contar, $prioridad, $f_inicio, $f_fin, $l_min, $l_max){
        
        $spec = function (Where $where) use($prioridad, $f_inicio, $f_fin){
            if($prioridad!="" && !empty($f_inicio) && !empty($f_fin)){
                $where->equalTo('prioridad', $prioridad)
                      ->AND
                      ->expression("DATE(fh_alerta) BETWEEN ? AND ?", array($f_inicio,$f_fin));
            }
            else{
                if($prioridad!="")
                    $where->equalTo('prioridad', $prioridad);
                else{
                    if(!empty($f_inicio) && !empty($f_fin))
                        $where->expression("DATE(fh_alerta) BETWEEN ? AND ?", array($f_inicio,$f_fin));
                }
            }
//            $this->tableGateway->getSql()->select()->where->
        };
        if($contar){
            $resultSet = $this->tableGateway->select(function(Select $select) use($spec){
                $select->where($spec);
            })->count();
        }
        else{
            $resultSet = $this->tableGateway->select(function(Select $select) use($spec, $l_min, $l_max){
                $select->where($spec)
                       ->limit($l_min)
                       ->offset($l_max);
            })->toArray();
        }//echo $select->getSqlString(); exit;
//        echo $this->tableGateway->getSql()->getSqlStringForSqlObject($resultSet);exit;
        return $resultSet;
    }
    
    public function getDetalleById($id){
        
        $spec = function (Select $select) use($id){
            $select->columns(array(
                'detalle' => 'detalle'
            ))
                   ->where(array('id' => $id));
        };
        $resultSet = $this->tableGateway->select($spec)->current()->getDetalle();
        return $resultSet;
    }
    
}