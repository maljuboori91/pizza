<?php

namespace Pizza\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Pizza implements InputFilterAwareInterface
{
  public $id;
  public $pizzaname;
  public $ingredients;
  
  protected $inputFilter;
    
  public function __construct() {
      
  }
  
  public function exchangeArray($data)
  {
       $this->id = (!empty($data['id'])) ? $data['id'] : null;
       $this->name  = (!empty($data['id'])) ? $data['id'] : null;
       $this->ingredients = (!empty($data['ingredients'])) ? $data['ingredients'] : null;
  }
  
  public function getArrayCopy()
  {
      return get_object_vars($this);
  }
  
  
  public function setInputFilter(InputFilter $inputfilter)
  {
      throw new \Exception("not used");
  }
  
  public function getInputFilter()
  {
      if(!$this->inputFilter)
      {
          $inputfilter = new InputFilter();
          $inputfilter->add(array(
                                'name' => 'pizzaname',
                                'required' => true,
                                'filters'  => array(
                                    'name' => 'StringTrim',
                                    'name' => 'StripTags'
                                ),
                                'validators' => array(
                                    'name' => 'StringLength',
                                    'options' =>array(
                                        'encoding' => 'UTF-8',
                                        'min'      => 5,
                                        'max'      => 30,
                                    )
                                )
                            )
                        );
          
          $inputfilter->add(array(
                                'name' => 'ingredients',
                                'required' => true,
                                'filters'  => array(
                                    'name' => 'StringTrim',
                                    'name' => 'StripTags'
                                ),
                                'validators' => array(
                                    'name' => 'StringLength',
                                    'options' =>array(
                                        'encoding' => 'UTF-8',
                                        'min'      => 5,
                                        'max'      => 255,
                                    )
                                )
                            )
                        );
      }
      
      return $this->inputFilter;
  }
}