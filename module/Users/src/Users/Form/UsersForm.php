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
        ));
        
        
        $this->add(array(
            'name' => 'cat',
            'type' => 'Text',
            'options' => array(
                'label' => 'Category'
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
    
}