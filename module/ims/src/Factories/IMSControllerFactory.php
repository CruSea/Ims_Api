<?php
/**
 * Created by PhpStorm.
 * User: fre
 * Date: 6/17/17
 * Time: 12:48 AM
 */

namespace ims\Factories;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use ims\Controllers\IMSController;
use ims\Services\Service;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class IMSControllerFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new IMSController(new Service($entityManager));
    }
}