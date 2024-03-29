<?php

namespace app\models\entity;

use app\models\Entity;

class Cart extends Entity
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

}