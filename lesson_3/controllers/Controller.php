<?php

namespace app\controllers;

use app\engine\TwigRender;
use app\interfaces\IRenderer;
use app\models\Cart;
use app\models\User;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    private $render;


    public function __construct(IRenderer $render)
    {
        $this->render = $render;
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
            return $this->renderTemplate('layouts/' . $this->layout, [
                'menu' => $this->render->renderTemplate('menu', [
                    'auth' => User::isAuth(),
                    'name' => User::getUserName(),
                    'count'=>Cart::getCountWhere('session_uid', $session_uid),
                ]),
                'content' => $this->render->renderTemplate($template, $params),
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }

    }

    private function renderTemplate($template, $params)
    {
        return $this->render->renderTemplate($template, $params);
    }
}