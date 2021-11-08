<?php

namespace app\controllers;

use app\engine\Request;

use app\models\entity\Cart;
use app\models\repositories\CartRepository;

class CartController extends Controller
{

    public function actionCart()
    {
        $page = $_GET['page'] ?? 0;
        $session_uid = session_id();
        $cart = (new CartRepository())->getCart($session_uid);
        $summ = (new CartRepository())->getTotal();
        $summ = $summ[0]['total'];

        echo $this->render('cart/cart', [
            'cart' => $cart,
            'page' => ++$page,
            'total' => $summ,
            'message'=>'',
        ]);
    }

    public function actionAdd()
    {
        $prod_id = (new Request())->getParams()['id'];
        $session_uid = session_id();

        $cart = new Cart($prod_id, 1, $session_uid);

        (new CartRepository())->save($cart);

        $response = [
            'status' => 'ok',
            'count' => (new CartRepository())->getCountWhere('session_uid', $session_uid)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionRemove()
    {
        $id = (new Request())->getParams()['id'];
        $session_uid = session_id();
        $status = 'ok';
        $cart = (new CartRepository())->getOne($id);

        if ($session_uid == $cart->session_uid) {
            (new CartRepository())->delete($cart);
        } else {
            $status = 'error';
        }
        $summ = (new CartRepository())->getTotal();
        $summ = $summ[0]['total'];
        $response = [
            'status' => $status,
            'count' => (new CartRepository())->getCountWhere('session_uid', $session_uid),
            'summ' => $summ,
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();

    }
}