<?php

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Users\Model\Users;
use Users\Form\UsersForm;

class UsersController extends AbstractActionController
{
    protected $userTable;
    
    public function indexAction()
    {
        return new ViewModel(array(
            'users' => $this->getUsersTable()->fetchAll(),
        ));
    }
    
    public function addAction()
    {
        $form = new UsersForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        if($request->isPost())
        {
            $Users = new Users();
            $form->setInputFilter($Users->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $Users->exchangeArray($form->getData());
                $this->getUsersTable()->saveUser($Users);
                
                return $this->redirect()->toRoute('users');
            }
        }
        return array('form' => $form);
    }
    
    public function editAction()
    {
        
    }
    
    public function deleteAction()
    {
        
    }
    
    public function getUsersTable()
    {
        if(!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('Users\Model\UsersTable');
        }
        return $this->userTable;
    }
}