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
         'template_path_stack' => array(
             'album-jpomalaza' => __DIR__ . '/../view',
         ),
     ),
 );