<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\entity\Cart;
use app\models\Repository;

class CartRepository extends Repository
{

    protected function getTableName()
    {
        return 'cart';
    }


    protected function getEntityClass()
    {
        return Cart::class;
    }

    public function getCart($session_uid) {
        $sql = "SELECT cart.id as cart_id, products.id as prod_id, products.title, products.description, products.price, cart.quant FROM `cart`,`products` WHERE `session_uid` = :session_uid AND cart.prod_id = products.id";
        return Db::getInstance()->queryAll($sql, ['session_uid' => $session_uid]);
    }

    public function getTotal(){
        $session_uid = session_id();
        $totalSql = "select sum(quant * price) as total from cart join products on products.id = cart.prod_id where session_uid =:session_uid";
        return Db::getInstance()->queryAll($totalSql, ['session_uid' => $session_uid]);
    }
}