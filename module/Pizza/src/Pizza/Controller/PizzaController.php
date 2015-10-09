<?php

namespace Pizza\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Pizza\Form\AddPizzaForm;
use Pizza\Model\Pizza;

class PizzaController extends AbstractActionController {
    
    protected $pizzaTable;
    
    public function indexAction() 
    {
        
        
    }
    
    public function addAction()
    {
        $add_form = new AddPizzaForm();
        $request = $this->getRequest();
        if( $request->isPost())
        {
            $pizza = new Pizza();
            $form->setInputFilter($pizza->getInputFilter());
            $add_form->setData($request->getPost());
            if($form->isValid())
            {
                $pizza->exchangeArray($form->getData());
                $pizza->getPizzaTable()->save($pizza);
            }
            return $this->redirect()->toRoute('pizza');
        }
        return array('form' => $add_form);
        
    }
    
    public function editAction()
    {
        
        
    }
    
    public function deleteAction()
    {
        
        
    }
    
    public function getPizzaTable()
    {
        if(!$this->pizzaTable)
        {
            $sm = $this->getServiceLocator();
            $this->pizzaTable = $sm->get('Pizza\Model\PizzaTable');
        }
        return $this->pizzaTable;
    }
    
    
}