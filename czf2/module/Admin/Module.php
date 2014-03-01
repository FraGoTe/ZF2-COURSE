<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Admin\Model\Categoria;
use Admin\Model\Proveedor;
use Admin\Model\Producto;
use Admin\Model\CategoriaTable;
use Admin\Model\ProveedorTable;
use Admin\Model\ProductoTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    /**
     * Carga la configuración de servicios del módulo TemaDb
     */
    public function getServiceConfig() {
        return array(
            'factories' => array(
                
                'Admin\Model\CategoriaTable' => function($sl){
                    $gateway = $sl->get('CategoriaTableGateway');
                    $table = new CategoriaTable($gateway);
                    return $table;
                },
                'CategoriaTableGateway' => function($sl) {
                    $adapter = $sl->get('dbadapter');
                    $rsPrototype = new ResultSet();
                    $rsPrototype->setArrayObjectPrototype(new Categoria());
                    $tableGateway = new TableGateway('categoria', $adapter, null, $rsPrototype);
                    return $tableGateway;
                },
                
                'Admin\Model\ProveedorTable' => function($sl){
                    $gateway = $sl->get('ProveedorTableGateway');
                    $table = new ProveedorTable($gateway);
                    return $table;
                },
                'ProveedorTableGateway' => function($sl) {
                    $adapter = $sl->get('dbadapter');
                    $rsPrototype = new ResultSet();
                    $rsPrototype->setArrayObjectPrototype(new Proveedor());
                    $tableGateway = new TableGateway('proveedor', $adapter, null, $rsPrototype);
                    return $tableGateway;
                },
                        
                'Admin\Model\ProductoTable' => function($sl){
                    $gateway = $sl->get('ProductoTableGateway');
                    $table = new ProductoTable($gateway);
                    return $table;
                },
                'ProductoTableGateway' => function($sl) {
                    $adapter = $sl->get('dbadapter');
                    $rsPrototype = new ResultSet();
                    $rsPrototype->setArrayObjectPrototype(new Producto());
                    $tableGateway = new TableGateway('producto', $adapter, null, $rsPrototype);
                    return $tableGateway;
                },
                        
                        
            ),
        );
    }    
    
    
}
