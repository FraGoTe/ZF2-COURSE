<?php

namespace AlbumWilson;

use AlbumWilson\Model\Album;
use AlbumWilson\Model\AlbumTable;
use Zend\Db\Resultset\Resultset;
use Zend\Db\TableGateway\TableGateway;

class Module 
{
   public function getAutoloaderConfig()
   {
       return array(
           'Zend\Loader\ClassMapAutoloader'=>array(
               __DIR__.'autoload_classmap.php',
           ),
           'Zend\loader\StandardAutoloader'=>array(
               'namespace'=>array(
                   __NAMESPACE__=>__DIR__.'/src/'.__NAMESPACE__,
               ),
           ),           
       );
   }
   
   public function getConfig()
   {
       return include __DIR__.'/config/module.config.php';       
   }
   
   public function getServiceConfig()
   {
         return array(
             'factories' => array(
                 'AlbumWilson\Model\AlbumTable' =>  function($sm) {
                     $tableGateway = $sm->get('AlbumTableGateway');
                     $table = new AlbumTable($tableGateway);
                     return $table;
                 },
                 'AlbumWilson' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Album());
                     return new TableGateway('t_album', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
}
