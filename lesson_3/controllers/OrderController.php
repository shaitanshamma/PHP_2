<?php

namespace app\controllers;

use app\engine\Request;
use app\models\entity\Order;
use app\models\repositories\OrderRepository;
use app\models\repositories\UserRepository;

class OrderController extends Controller
{

    public function actionOrder()
    {
        $userRepository = new UserRepository();
        $session_uid = session_id();
        $page = $_GET['page'] ?? 0;

        if ($userRepository->getName()==='admin'){
            $order = (new OrderRepository())->getAll();
            echo $this->render('order/order', [
                'order' => $order,
                'page' => ++$page
            ]);
        }else{
            $order = (new OrderRepository())->getOneWhere("session_uid", $session_uid);
            echo $this->render('order/order', [
                'order' => $order,
                'page' => ++$page
            ]);
        }
    }

    public function actionConfirm()
    {
        $request = new Request();
        $session_uid = session_id();
        $name = $request->getParams()['name'];
        $phone = $request->getParams()['phone'];
        $total = (float)$request->getParams()['total'];
        $order = new Order($name, $phone, $session_uid, $total);
        (new OrderRepository())->save($order);
        session_regenerate_id();
        echo $this->render('cart/cart', [
            'message' => "Заказ успешно создан!",
        ]);
    }

}