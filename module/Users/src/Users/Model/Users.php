<?php

namespace Users\Model;

use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

class Users implements InputFilterAwareInterface
{
    public $id;
    public $username;
    public $cat;
    protected $inputFilter;
    
    public function exchangeArray($data)
    {
        $this->id        = (!empty($data['id'])) ? $data['id'] : null;
        $this->username  = (!empty($data['username'])) ? $data['username'] : null;
        $this->cat       = (!empty($data['cat'])) ? $data['cat'] : null;
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception('Not used');
    }
    
    public function getInputFilter()
    {
        if(!$this->inputFilter) {
            $inputFilter = new InputFilter();
            
            $inputFilter->add(array(
                'name'      => 'id',
                'required'  => true,
                'filters'   => array(
                    array('name' => 'Int'),
                ),
            ));
            
            $inputFilter->add(array(
               'name'       => 'username',
               'required'   => true,
               'filters'    => array(
                   array('name' => 'StripTags'),
                   array('name' => 'StringTrim'),
               ),
               'validators' => array(
                   array(
                       'name'    => 'StringLength',
                       'options' => array(
                           'encoding' => 'UTF-8',
                           'min'      => 1,
                           'max'      => 100,
                       ),
                   ),
               ),
            ));
            
            $inputFilter->add(array(
                'name'      => 'cat',
                'required'  => true,
                'filters'   => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      =>100,
                    )
                )
            ));
            
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}
