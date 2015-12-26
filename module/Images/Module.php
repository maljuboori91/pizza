<?php

/* 
 * Mohammed Aljuboori
 * New page - 2015.11.19
 */

 namespace Images;

 use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
 use Zend\ModuleManager\Feature\ConfigProviderInterface;

 class Module implements ConfigProviderInterface
 {
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     // Autoload all classes from namespace 'Blog' from '/module/Blog/src/Blog'
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 )
             )
         );
     }
     
    public function getConfig()
       {
           return include __DIR__ . '/config/module.config.php';
       }
    
 }