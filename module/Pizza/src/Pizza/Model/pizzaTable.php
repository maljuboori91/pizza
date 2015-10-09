<?php

namespace Pizza\Model;
use Zend\Db\TableGateway\TableGateway;

class PizzaTable {
    
    protected $tableGatway;
    public function __construct(TableGatewaytway $tableGateway) {
        $this->tableGatway = $tableGateway;
    }
    
    public function find_all()
    {
        // SELECT * FROM Pizza
        return $this->tableGatway->select();
    }
    
    public function find_by_id($id = 0)
    {
        $id = (int)$id;
        $result = $this->tableGatway->select(array(array('id' => $id)));
        $row    = $this->tableGatway->current();
        
        if($row)
        {
            return $row;
        }
        else {
            return null;
        }
    }
    
    public function save(Pizza $pizz)
    {
        $data = array('name' => $pizza->name,
                      'ingrediennts' => $pizza->ingredients);
        $id = (int)$pizza->id;
        if($id == null)
        {
            // IN CASE INSERT NEW RECORD
            $this->tableGatway->insert($data);
        }
        else {
            // UPDATE EXISTING RECORD
            
            if($this->find_by_id($id))
            {
                $this->tableGatway->update($data, array('id' => $id));
            }
            else {
                throw new \Exception("the pizza with the id = {$id} could not be found in DB");   
            }
        }
    }
    
    public function delete($id = 0)
    {
        $this->tableGatway->delete(array('id' => (int)$id));
    }
}