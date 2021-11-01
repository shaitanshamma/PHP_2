<?php

namespace app\controllers;

use app\models\Cart;

class CartController extends Controller
{
    public function actionCart()
    {
        $page = $_GET['page'] ?? 0;

        $cart = Cart::getLimit(($page + 1) * 2); //2  4 6 8
        echo $this->render('cart/cart', [
            'cart' => $cart,
            'page' => ++$page
        ]);
    }
}