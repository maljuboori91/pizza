<?php

namespace Pizza;

class Module {
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(__DIR__ . 'autoload_classmap.php',),
            'Zend\Loader\ClassMapAutoloader' => array('namespace' => array(__DIR__ . '/src/' . __NAMESPACE__,),),
            );
    }
    
    public function getConfig()
    {
      return include __DIR__ . '/config/module.config.php';
    }
}
