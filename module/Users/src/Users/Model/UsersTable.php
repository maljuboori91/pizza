<?php

namespace Users\Model;

 use Zend\Db\TableGateway\TableGateway;

 class UsersTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
    
    public function getUser($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if($row) {
            throw new \Exception("Could not find row $id");
        }
        
        return $row;
    }
    
    public function saveUser(Users $user)
    {
        $data = array(
            'username' => $user->username,
            'cat'      => $user->cat,
        );
        
        $id = (int) $user->id;
        if($id === 0) {
            $this->tableGateway->insert($data);
        }
        else {
            if($this->getUser($id)) {
                $this->tableGateway->update($data, array('id', $id));
            }
            else {
                throw new \Exception('User id does not found');
            }
        }
    }
    
    public function deleteUser($id)
    {
        $id = (int) $id;
        $this->tableGateway->delete(array('id' => $id));
    }
}

