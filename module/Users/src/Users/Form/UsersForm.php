<?php

namespace Users\Form;

use Zend\Form\Form;

class UsersForm extends Form 
{
    public function __construct($name = null)
    {
        parent::__construct('Users');
        
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        
        $this->add(array(
           'name' => 'username',
           'type' => 'Text',
           'options' => array(
                'label' => 'Username',
            ),
           'attributes' => array(
               'class' => 'form-control'
           ),
        ));
        
        
        $this->add(array(
            'name' => 'cat',
            'type' => 'Text',
            'options' => array(
                'label' => 'Category'
            ),
            'attributes' => array(
               'class' => 'form-control'
           ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
                'class' => 'form-control',
            ),
        ));
    }
    
}