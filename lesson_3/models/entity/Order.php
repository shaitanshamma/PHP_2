<?php

namespace app\models\entity;

use app\models\Entity;

class Order extends Entity
{
    public $id;
    public $name;
    public $phone;
    public $session_uid;
    public $total;

    public function __construct($name = null, $phone = null,  $session_uid = null, $total = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_uid = $session_uid;
        $this->total = $total;
    }

}