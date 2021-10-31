<?php

namespace app\controllers;

use app\models\Product;

class MainController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
}