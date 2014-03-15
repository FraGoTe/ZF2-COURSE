<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
     'controllers' => array(
         'invokables' => array(
             'AlbumJpomalaza\Controller\Album' => 'AlbumJpomalaza\Controller\AlbumController',
         ),
     ),
    
     // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'albumjpomalaza' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/albumjpomalaza[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'AlbumJpomalaza\Controller\Album',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),
    
     'view_manager' => array(
         'template_map' => array(
            'album-jpomalaza/layout'  => __DIR__ . '/../view/album-jpomalaza/layout/layout.phtml',
            'album-jpomalaza/blank'   => __DIR__ . '/../view/album-jpomalaza/layout/blank.phtml',
         ),
         'template_path_stack' => array(
             'album-jpomalaza'        => __DIR__ . '/../view',
         ),
     ),
    
     'db' => array(
         'driver'         => 'Pdo',
         'dsn'            => 'mysql:dbname=test;host=localhost',
         'driver_options' => array(
             PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
         ),
     ),
     'service_manager' => array(
         'factories' => array(
             'Zend\Db\Adapter\Adapter'
                     => 'Zend\Db\Adapter\AdapterServiceFactory',
         ),
     ),
    
 );