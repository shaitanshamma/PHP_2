<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\UserRepository;

class AuthController extends Controller
{

    protected $request;

    public function __construct()
    {
        $this->request = new Request();
    }


    public function actionLogin()
    {
        $this->render('login', [
            'auth' => (new UserRepository())->isAuth()
        ]);

    }

    public function actionLog()
    {
        if (isset($_POST['ok'])) {
            $login = $this->request->getLogin();
            $pass = $this->request->getPass();

            if ((new UserRepository())->auth($login, $pass)) {
                header("Location:" . $_SERVER['HTTP_REFERER']);
                die();
            } else {
                die("Не верный логин пароль");
            }
        }
    }

    public function actionLogout()
    {
        session_regenerate_id();
        session_destroy();
        header("Location:" . $_SERVER['HTTP_REFERER']);
        die();
    }

}