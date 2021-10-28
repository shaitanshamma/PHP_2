<?php

namespace app\controllers;

use app\models\Product;

class ProductController
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

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

    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
       // $catalog = Product::getAll();


        $page = $_GET['page'] ?? 0;

        $catalog = Product::getLimit(($page + 1) * 2); //2  4 6 8

        echo $this->render('product/catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];

        $product = Product::getOne($id);

        echo $this->render('product/card', [
            'product' => $product
        ]);
    }

    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate('layouts/' . $this->layout, [
                'menu' => $this->renderTemplate('menu', $params),
                'content' => $this->renderTemplate($template, $params),
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }

    }


    //$params = ['catalog' => [1,2,3]];
    public function renderTemplate($template, $params) {

        ob_start();

        extract($params);

        $templatePath = VIEWS_DIR . $template . ".php";

        include $templatePath;

        return ob_get_clean();
    }
}