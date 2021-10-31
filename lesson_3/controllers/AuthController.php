<?php

namespace app\controllers;

use app\models\User;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $this->render('login', [
            'auth' => User::isAuth()
        ]);

    }
    public function actionLog(){
        if (isset($_POST['ok'])) {
            $login = strip_tags($_POST['login']);
            $pass = strip_tags($_POST['pass']);
            $user = User::getName($login);
            if (password_verify($pass, $user->password)) {
                $_SESSION['login'] = $login;
                $this->render('login', [
                    'name' => $_SESSION['login'],
                    'auth' => User::isAuth(),
                ]);
            }
        }
    }
    public function actionLogout()
    {
        session_destroy();
        header("Location: /");
    }
}