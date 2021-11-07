<?php

use app\models\entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProductTitle()
    {
        $title = "Рубашка";
        $product = new Product(null, $title);
        $this->assertEquals($title, $product->title);
    }

    public function testProductBrokenTitle()
    {
        $title = "Рубашка";
        $product = new Product(null, $title);
        $this->assertEquals($title, "Штанцы");
    }

    public function testProductImg()
    {
        $img = "001.png";
        $product = new Product($img);
        $this->assertEquals($img, $product->img);
    }

    public function testProductDescription()
    {
        $description = "Классное худи";
        $product = new Product(null, null, $description);
        $this->assertEquals($description, $product->description);
    }

    public function testProductPrice()
    {
        $price = 123;
        $product = new Product(null, null, null, $price);
        $this->assertEquals($price, $product->price);
    }
}