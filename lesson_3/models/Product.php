<?php

namespace app\models;


class Product extends DbModel
{
    protected $id;
    protected $img;
    protected $title;
    protected $description;
    protected $price;

//    protected $props = [];

    public function __construct($img = null, $title = null, $description = null, $price = null)
    {
        $this->img = $img;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }


    public static function getTableName()
    {
        return 'products';
    }

}