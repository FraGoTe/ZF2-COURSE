<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TemaDb;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

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
     * Carga la configuración de servicios del módulo Administracion
     */
    public function getServiceConfig() {
        return array(
            'factories' => array(
//                'Admin\Model\CategoriaTable' => function($sm) {
//                    $table = new CategoriaTable($sm);
//                    $table->setTableGateway('CategoriaTableGateway');
//                    return $table;
//                },
//                'CategoriaTableGateway' => function($sm) {
//                    $dbAdapter = $sm->get('dbadapter');
//                    $rsPrototype = new ResultSet();
//                    $rsPrototype->setArrayObjectPrototype(new Categoria());
//                    return new TableGateway(
//                            'categoria', $dbAdapter, null, $rsPrototype
//                    );
//                },
            ),
        );
    }    
    
    
}
