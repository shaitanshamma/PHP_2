<?php

namespace app\controllers;

use app\models\Order;

class OrderController extends Controller
{

    public function actionOrder()
    {

        $page = $_GET['page'] ?? 0;
        $order = Order::getAll();
        echo $this->render('order/order', [
            'order' => $order,
            'page' => ++$page
        ]);
    }

}