<?php

namespace Pizza\Form;
use Zend\Form\Form;

class AddPizzaForm extends Form {
    public function __construct()
    {
        parent::__construct('addpizzaform');
        
        $this->add(array(
           'name' => 'pizzaname',
           'type' => 'text',
           'options' => array('label' => 'Pizza Name'),
           'attributes' => array(
               'class' => 'form-control'
           )
        ));
        
        $this->add(array(
            'name' => 'ingredients',
            'type' => 'textarea',
            'options' => array('label' => 'Ingredients'),
           'attributes' => array(
               'class' => 'form-control'
            )
        ));
        
        $this->add(array(
           'name' => 'add_pizza',
           'type' => 'submit',
           'attributes' => array(
                'value' => 'Add New Pizza',
                'id'    => 'submitbutton',
                'class' => 'btn'
            )
        ));
    }
}