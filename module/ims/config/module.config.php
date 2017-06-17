<?php
/**
 * Created by PhpStorm.
 * User: fre
 * Date: 6/16/17
 * Time: 11:48 PM
 */
namespace ims;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use ims\Controllers\IMSController;
use ims\Factories\IMSControllerFactory;

return array(
    'router' => array(
        'routes' => array(
            'ims' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/api',
                    'defaults' => array(
                        'controller' => IMSController::class,
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            IMSController::class => IMSControllerFactory::class,
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
        'display_not_found_reason' => false,
        'display_exceptions' => false,
        'doctype' => 'HTML5',
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Entities')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entities' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
);