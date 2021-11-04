<?php

namespace app\controllers;

use app\engine\Request;
use app\models\Cart;

class CartController extends Controller
{
    public function actionCart()
    {
        $page = $_GET['page'] ?? 0;
        $session_uid = session_id();
        $cart = Cart::getCart($session_uid);
        echo $this->render('cart/cart', [
            'cart' => $cart,
            'page' => ++$page
        ]);
    }

    public function actionAdd() {
        $prod_id = (new Request())->getParams()['id'];
        $session_uid = session_id();

        (new Cart($prod_id,1, $session_uid ))->save();

        $response = [
            'status' => 'ok',
            'count' => Cart::getCountWhere('session_uid', $session_uid)
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionRemove() {
        $prod_id = (new Request())->getParams()['id'];
        //TODO сделать сессию
        $session_uid = session_id();
        (new Cart())->delete($prod_id);

        $response = [
            'status' => 'ok',
            'count' => Cart::getCountWhere('session_uid', $session_uid)
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}