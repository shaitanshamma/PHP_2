<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\entity\Order;
use app\models\repositories\OrderRepository;
use app\models\repositories\UserRepository;

class OrderController extends Controller
{

    public function actionOrder()
    {
        $session_uid = session_id();
        $page = $_GET['page'] ?? 0;

        if (App::call()->usersRepository->getName() === 'admin') {
            $order = App::call()->orderRepository->getAll();
            echo $this->render('order/order', [
                'order' => $order,
                'page' => ++$page
            ]);
        } else {
            $order = App::call()->orderRepository->getOneWhere("session_uid", $session_uid);
            echo $this->render('order/order', [
                'order' => $order,
                'page' => ++$page
            ]);
        }
    }

    public function actionConfirm()
    {
        $session_uid = session_id();
        $name = App::call()->request->getParams()['name'];
        $phone = App::call()->request->getParams()['phone'];
        $total = (float)App::call()->request->getParams()['total'];
        $order = new Order($name, $phone, $session_uid, $total);
        App::call()->orderRepository->save($order);
        session_regenerate_id();
        echo $this->render('cart/cart', [
            'message' => "Заказ успешно создан!",
        ]);
    }

    public function actionCustom()
    {
        $id= App::call()->request->getParams()['uid'];

        $order =  App::call()->orderRepository->getOneWhere("id", $id);

        echo $this->render('order/customOrder', [
            'order' => $order,
        ]);
    }
}