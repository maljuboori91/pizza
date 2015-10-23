<?php

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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