<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Request;

use app\models\entity\Cart;
use app\models\repositories\CartRepository;

class CartController extends Controller
{

    public function actionCart()
    {
        $page = $_GET['page'] ?? 0;
        $session_uid = session_id();
        $cart = App::call()->cartRepository->getCart($session_uid);
        $summ = App::call()->cartRepository->getTotal();
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
        $prod_id = App::call()->request->getParams()['id'];
        $session_uid = session_id();

        $cart = new Cart($prod_id, 1, $session_uid);

        App::call()->cartRepository->save($cart);

        $response = [
            'status' => 'ok',
            'count' => App::call()->cartRepository->getCountWhere('session_uid', $session_uid)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionRemove()
    {
        $id = App::call()->request->getParams()['id'];
        $session_uid = session_id();
        $status = 'ok';
        $cart = App::call()->cartRepository->getOne($id);

        if ($session_uid == $cart->session_uid) {
            App::call()->cartRepository->delete($cart);
        } else {
            $status = 'error';
        }
        $summ = App::call()->cartRepository->getTotal();
        $summ = $summ[0]['total'];
        $response = [
            'status' => $status,
            'count' => App::call()->cartRepository->getCountWhere('session_uid', $session_uid),
            'summ' => $summ,
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();

    }
}