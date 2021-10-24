<?php

namespace app\models;

class Order extends Model
{
    public $id;
    public $name;
    public $phone;
    public $date;
    public $session_uid;


    public function __construct($name = null, $phone = null, $date = null, $session_uid = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->date = $date;
        $this->session_uid = $session_uid;
    }

    public function getTableName()
    {
        return 'orders';
    }

}