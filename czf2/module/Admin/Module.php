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
use Admin\Model\Familia;
use Admin\Model\CategoriaTable;
use Admin\Model\ProveedorTable;
use Admin\Model\ProductoTable;
use Admin\Model\FamiliaTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Log\Logger;
use Zend\Log\Writer\Db as WriterDb;

use Zend\Mail\Transport\Smtp;
use Zend\Mail\Message;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Log\Writer\Mail;
use Zend\Log\Filter\Priority;


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
                    $table = new ProductoTable($gateway,$sl);
                    return $table;
                },
                'ProductoTableGateway' => function($sl) {
                    $adapter = $sl->get('dbadapter');
                    $rsPrototype = new ResultSet();
                    $rsPrototype->setArrayObjectPrototype(new Producto());
                    $tableGateway = new TableGateway('producto', $adapter, null, $rsPrototype);
                    return $tableGateway;
                },
                        
                        
                'Admin\Model\FamiliaTable' => function($sl){
                    $gateway = $sl->get('FamiliaTableGateway');
                    $table = new FamiliaTable($gateway);
                    return $table;
                },
                'FamiliaTableGateway' => function($sl) {
                    $adapter = $sl->get('dbadapter');
                    $rsPrototype = new ResultSet();
                    $rsPrototype->setArrayObjectPrototype(new Familia());
                    $tableGateway = new TableGateway('familia', $adapter, null, $rsPrototype);
                    return $tableGateway;
                },
                        
                'Logger' => function ($sl) {
                    
                    // Log en BD
                    $adapter = $sl->get('dbadapter');
                    $logger    = new Logger();
                    $map = array(
                        'timestamp'     => 'fh',
                        'message'       => 'mensaje',
                        'priority'      => 'prioridad',
                        'priorityName'  => 'nombre'
                    );
                    $writerDb    = new WriterDb($adapter,'log',$map);
                    $logger->addWriter($writerDb);
                    
                    // Log en Email
                    $mailMsg = new Message();
                    $mailMsg->addFrom('alertas@gibarcena.com.pe','Servicio de Alertas');
                    $mailMsg->addTo('ernestex@gmail.com','Ernesto');
                    $mailMsg->setSubject('LOG CDS '.date('Ymd His'));
                    $mailTransport = new Smtp(new SmtpOptions(array(
                        'name'              => 'correo.gibarcena.com.pe',
                        'host'              => 'correo.gibarcena.com.pe',
                        'port'              => 25, // Notice port change for TLS is 587
                        'connection_class'  => 'login',
                        'connection_config' => array(
                            'username' => 'jpomalaza', // Ver local.php
                            'password' => '214825aa', // Ver local.php
//                            'ssl'      => 'tls',
                    ))));
                    $writerMail = new Mail($mailMsg,$mailTransport);
                    $filterMail = new Priority(Logger::CRIT);
                    $writerMail->addFilter($filterMail);
                    $logger->addWriter($writerMail);
                    
                    
                    return $logger;
                },
                        
            ),
        );
    }    
    
    
}
