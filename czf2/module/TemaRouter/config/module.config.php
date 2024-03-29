<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'tema-router' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/tema-router',
                    'defaults' => array(
                        '__NAMESPACE__' => 'TemaRouter\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'destino' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/destino-como-ruta-hija',
                            'defaults' => array(
                                'controller' => 'Index',
                                'action'     => 'destino',
                            ),
                        ),
                    ),
                ),
            ),
            'destino' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/destino-como-ruta-padre',
                    'defaults' => array(
                        '__NAMESPACE__' => 'TemaRouter\Controller',
                        'controller'    => 'Index',
                        'action'        => 'destino',
                    ),
                ),
                'may_terminate' => true,
            ),
            'bridge.js' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/static/bridge.js',
                    'defaults' => array(
                        '__NAMESPACE__' => 'TemaRouter\Controller',
                        'controller'    => 'Index',
                        'action'        => 'bridge',
                    ),
                ),
                'may_terminate' => true,
            ),
            'destino-params' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/destino-acepta-parametros/ciudad/[:id]',
                    'constraints' => array(
//                        'id' => '[0-9]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'TemaRouter\Controller',
                        'controller'    => 'Index',
                        'action'        => 'destino',
                    ),
                ),
                'may_terminate' => true,
            ),
            'destino-seo' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/destino/[:ciudad]/[:pais]/[:id]',
                    'constraints' => array(
                        'ciudad' => '[a-zA-Z][a-zA-Z-]*',
                        'pais' => '[a-zA-Z][a-zA-Z-]*',
                        'id' => '[0-9]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'TemaRouter\Controller',
                        'controller'    => 'Index',
                        'action'        => 'destino',
                    ),
                ),
                'may_terminate' => true,
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
        'factories' => array(
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'TemaRouter\Controller\Index' => 'TemaRouter\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'admin/blank'           => __DIR__ . '/../view/layout/blank.phtml',
            'tema-router/index/index' => __DIR__ . '/../view/tema-router/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
