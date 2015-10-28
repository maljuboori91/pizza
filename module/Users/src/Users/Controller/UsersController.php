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
        $id = (int) $this->params()->fromRoute('id', 0);
        
         if (!$id) {
             return $this->redirect()->toRoute('users', array(
                 'action' => 'add'
             ));
         }
         
         try {
             $users = $this->getUsersTable()->getUser($id);
            }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('users', array(
                 'action' => 'index'
             ));
            }
        
        $form = new UsersForm();
        $form->bind($users);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if($request->isPost()) {
            $form->setInputFilter($users->getInputFilter());
            $form->setData($request->getPost());
            
            if($form->isValid()) {
                $this->getUsersTable()->saveUser($users);
                
                return $this->redirect()->toRoute('users');
            }
        }
        return array(
            'id'    => $id,
            'form'  => $form,
        );
    }
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if(!$id) {
            return $this->redirect()->toRoute('users');
        }
        
        $request = $this->getRequest();
        if($request->isPost()) {
            $del = $request->getPost('del', 'No');
            
            if($del == "Yes") {
                $id = (int) $request->getPost('id');
                $this->getUsersTable()->deleteUser($id);
            }
            
            return $this->redirect()->toRoute('users');
        }
        
        return array(
            'id'    => $id,
            'user'  => $this->getUsersTable()->getUser($id),
        );
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