<?php

namespace app\models\entity;

use app\models\Entity;

class Product extends Entity
{
    protected $id;
    protected $img;
    protected $title;
    protected $description;
    protected $price;

    public function __construct($img = null, $title = null, $description = null, $price = null)
    {
        $this->img = $img;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }

}