<?php

namespace app\models\repositories;


use app\models\entity\User;
use app\models\Repository;


class UserRepository extends Repository
{

    public function auth($login, $pass) {

        $user = $this->getOneWhere('login', $login);

        if (password_verify($pass, $user->password)) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public function isAuth() {
        return isset($_SESSION['login']);
    }

    public function getName() {
        return $_SESSION['login'];
    }

    protected function getTableName() {
        return 'users';
    }


    protected function getEntityClass()
    {
        return User::class;
    }
}