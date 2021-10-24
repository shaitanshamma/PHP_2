<?php

namespace app\models;

class User extends Model
{
    public $id;
    public $login;
    public $password;
    public $role;

    public function __construct($login = null, $password = null, $role = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->role = $role;
    }


    public function getTableName()
    {
        return 'users';
    }

}