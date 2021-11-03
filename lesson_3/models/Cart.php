<?php

namespace app\models;

use app\engine\Db;

class Cart extends DbModel
{
    public $id;
    public $prod_id;
    public $quant;
    public $session_uid;


    public function __construct($prod_id = null, $quant = null, $session_uid = null)
    {
        $this->prod_id = $prod_id;
        $this->quant = $quant;
        $this->session_uid = $session_uid;
    }


    public static function getTableName()
    {
        return 'cart';
    }

    public static function getCart($session_uid) {
        $sql = "SELECT cart.id as cart_id, products.id as prod_id, products.title, products.description, products.price, cart.quant FROM `cart`,`products` WHERE `session_uid` = :session_uid AND cart.prod_id = products.id";
        return Db::getInstance()->queryAll($sql, ['session_uid' => $session_uid]);
    }

}