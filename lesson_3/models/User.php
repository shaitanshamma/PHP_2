<?php

namespace app\models;

use app\engine\Db;

class User extends DbModel
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

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function getNameW() {
        return $_SESSION['login'];
    }

    public static function getTableName()
    {
        return 'users';
    }

    public static function getUserByName($name)
    {
        return $name;
    }

}