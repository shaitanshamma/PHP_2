<?php

namespace app\models;

class Order extends DbModel
{
    public $id;
    public $name;
    public $phone;
    public $date;
    public $session_uid;
    public $total;


    public function __construct($name = null, $phone = null, $date = null, $session_uid = null, $total = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->date = $date;
        $this->session_uid = $session_uid;
        $this->total = $total;
    }

    public static function getTableName()
    {
        return 'orders';
    }

}