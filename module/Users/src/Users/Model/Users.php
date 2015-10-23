<?php

namespace Users\Model;

class Users
{
    public $id;
    public $username;
    public $cat;
    
    public function exchangeArray($data)
    {
        $this->id        = (!empty($data['id'])) ? $data['id'] : null;
        $this->username  = (!empty($data['username'])) ? $data['username'] : null;
        $this->cat       = (!empty($data['cat'])) ? $data['cat'] : null;
    }
}
