<?php

namespace app\controllers;

use app\engine\TwigRender;
use app\interfaces\IRenderer;
use app\models\Cart;
use app\models\repositories\CartRepository;
use app\models\repositories\UserRepository;
use app\models\User;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    private $render;

//    private  $userRepository;
//    private  $cartRepository;

    public function __construct(IRenderer $render)
    {
        $this->render = $render;
//        $this->cartRepository = new CartRepository();
//        $this->userRepository = new UserRepository();
    }


    public function runAction($action)
    {
        $this->action = $action ?? $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die("Нет такого экшена");
        }
    }

    public function render($template, $params = []) {
        $session_uid = session_id();
        if ($this->useLayout) {
            return $this->render->renderTemplate('layouts/' . $this->layout, [
                'menu' => $this->render->renderTemplate('menu', [
                    'auth' => (new UserRepository())->isAuth(),
                    'name' => (new UserRepository())->getName(),
                    'count'=>(new CartRepository())->getCountWhere('session_uid', $session_uid),
                ]),
                'content' => $this->render->renderTemplate($template, $params),
            ]);
        } else {
            return $this->render->renderTemplate($template, $params);
        }

    }

    private function renderTemplate($template, $params)
    {
        return $this->render->renderTemplate($template, $params);
    }
}