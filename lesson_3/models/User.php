<?php

namespace app\models;

use app\engine\Db;

class User extends Entity
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

}