<?php

namespace Pizza;
use Pizza\Model\Pizza;
use Pizze\Model\PizzaTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module {
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(__DIR__ . '/autoload_classmap.php',),
            'Zend\Loader\StandardAutoloader' => array('namespaces' => array(__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__ ,),),);
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig()
    {
        return array('factories' => array(
            'Pizza\Model\PizzaTable' => function ($sm)
            {
                $tableGateway = $sm->get('PizzaTableGateway');
                $table        = new PizzaTable($tableGatway);
                return $table;
            },
                'PizzaTableGateway' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Pizza());
                    return new TableGateway('pizza', $dbAdapter, null, $resultSetPrototype);
                }
        ));
    }
}
