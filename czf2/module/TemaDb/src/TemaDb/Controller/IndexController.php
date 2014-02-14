<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TemaDb\Controller;

use TemaDb\Model\Categoria;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{
    
    public function indexAction()
    {
        $view = new ViewModel();
        $view->titulo = 'Db';
        return $view;
    }
    
    public function tableGatewayAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $tableGateway = new TableGateway('categoria', $adapter);
        $view->data = $tableGateway->select();
        return $view;
    }
    
    public function tableGatewayResultSetIteradoAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $tableGateway = new TableGateway('categoria', $adapter);
        $view->data = $tableGateway->select();
        return $view;
    }
    
    public function tableGatewayResultSetArrayAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $tableGateway = new TableGateway('categoria', $adapter);
            $view->data = $tableGateway->select()->toArray();
        return $view;
    }
    
    public function tableGatewayResultSetPrototypeAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        
        $rsPrototype = new ResultSet();
        $rsPrototype->setArrayObjectPrototype(new Categoria());
        
        $tableGateway = new TableGateway('categoria', $adapter, null, $rsPrototype);
        $view->data = $tableGateway->select();
        return $view;
    }
    
    public function selectColsPrototypeAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $rsPrototype = new ResultSet();
        $rsPrototype->setArrayObjectPrototype(new Categoria());
        $tableGateway = new TableGateway('categoria', $adapter, null, $rsPrototype);
        $spec = function (Select $select){
            $select->columns(array('nombre','activo'));
        };
        $view->data = $tableGateway->select($spec);
        return $view;
    }
    
    public function selectColsArrayAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $tableGateway = new TableGateway('categoria', $adapter);
        $spec = function (Select $select){
            $select->columns(array('nombre','activo'));
        };
        $view->data = $tableGateway->select($spec)->toArray();
        return $view;
    }
    
    public function selectColsArrayAliasAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $tableGateway = new TableGateway('categoria', $adapter);
        $spec = function (Select $select){
            $select->columns(array( 'categoria' => 'nombre', 'valida'=>'activo'));
        };
        $view->data = $tableGateway->select($spec)->toArray();
        return $view;
    }
    
    public function selectWherePkAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $rsPrototype = new ResultSet();
        $rsPrototype->setArrayObjectPrototype(new Categoria());
        $tableGateway = new TableGateway('categoria', $adapter, null, $rsPrototype);
        $id = 1;
        $spec = function (Select $select) use ($id) {
            $select->columns(array('nombre','activo'))
                ->where(array('id' => $id))
                ;
        };
        $view->data = $tableGateway->select($spec)->current();
        return $view;
    }
    
    public function selectWhereListaAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $rsPrototype = new ResultSet();
        $rsPrototype->setArrayObjectPrototype(new Categoria());
        $tableGateway = new TableGateway('categoria', $adapter, null, $rsPrototype);
        $flag = 0;
        $spec = function (Select $select) use ($flag) {
            $select->columns(array('nombre','activo'))
                ->where(array('activo' => $flag))
                ;
        };
        $view->data = $tableGateway->select($spec);
        return $view;
    }
    
    public function insertAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $tableGateway = new TableGateway('categoria', $adapter);
        $tableGateway->insert(array(
            'nombre'=> 'Cat '.rand(111,999),
            'creado'=> date('Y-m-d H:i:s'),
            'activo'=> rand(0,1),
        ));
        return $view;
    }
    
    public function updateAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $tableGateway = new TableGateway('categoria', $adapter);
        $tableGateway->update(array(
            'nombre'=> 'Cat EDIT '.rand(111,999),
            'creado'=> date('Y-m-d H:i:s'),
            'activo'=> rand(0,1),
        ),array('id'=>  rand(3, 6)));
        return $view;
    }
    
    public function deleteAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $tableGateway = new TableGateway('categoria', $adapter);
        $tableGateway->delete(array('id'=> 5));
        return $view;
    }
    
    public function slAction()
    {
        $view = new ViewModel();
        $sl = $this->getServiceLocator();
        $adapter = $sl->get('dbadapter');
        $view->data = $tableGateway->select();
        return $view;
    }
    
    
}
