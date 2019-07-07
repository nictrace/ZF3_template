<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\Router\Http\Method;
use Zend\ServiceManager\Factory\InvokableFactory;
//use Controller\Factory\IndexControllerFactory;

return [
    'router' => [
        'routes' => [
            'photo' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/photo',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'photo',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'myroute1get' => [			// This child route will match GET request
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'get',
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                                'action'     => 'getfoto'
                            ],
                        ],
                    ],
                    'myroute1post' => [			// This child route will match POST request
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'post',
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                                'action'     => 'savefoto'
                            ],
                        ],
                    ],
                ],
            ],
            'save' => [
                'type'=> Method::class,
                'options' => [
                    'route' => '/save',
                    'verb' => 'post',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'savepoint'
                    ],
                ],
            ],
            'map' => [
		'type' => Segment::class,
		'options' => [
		    'route' => '/map',
		    'defaults' => [
			'controller' => Controller\IndexController::class,
			'action' => 'map',
		    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'myroute2get' => [                  // This child route will match GET request
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'get',
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                                'action'     => 'map'
                            ],
                        ],
                    ],
                    'myroute2post' => [                 // This child route will match POST request
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'post',
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                                'action'     => 'savepoint'
                            ],
                        ],
                    ],
                ],
	    ],
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factories\IndexControllerFactory::class, //InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'map/map'		      => __DIR__ . '/../view/application/map.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
