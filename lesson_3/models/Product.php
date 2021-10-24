<?php

namespace app\models;


class Product extends Model
{
    public $id;
    public $img;
    public $title;
    public $description;
    public $price;


    public function __construct($img = null, $title = null, $description = null, $price = null)
    {
        $this->img = $img;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }


    public function getTableName()
    {
        return 'products';
    }


}