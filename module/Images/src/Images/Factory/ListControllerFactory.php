<?php

/* 
 * Mohammed Aljuboori
 * New page - 2015.11.22
 */

namespace Images\Factory;

use Images\Controller\ListController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListControllerFactory implements FactoryInterface
{
    /*
     * Create service
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * 
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator  = $serviceLocator->getServiceLocator();
        $postService              = $realServiceLocator->get('Images\service\PostServiceInterface');
    
        return new ListController($postService);
    }
}