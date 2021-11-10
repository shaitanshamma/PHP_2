<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\repositories\UserRepository;

class AuthController extends Controller
{
//
//    protected $request;
//
//    public function __construct()
//    {
//        $this->request = new Request();
//    }


    public function actionLogin()
    {
        $this->render('login', [
//            'auth' => (new UserRepository())->isAuth()
            'auth' => App::call()->usersRepository->isAuth()
        ]);

    }

    public function actionLog()
    {
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];

        if (App::call()->usersRepository->auth($login, $pass)) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            die("Не верный логин пароль");
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