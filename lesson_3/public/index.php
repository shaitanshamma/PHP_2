<?php

use app\engine\{Autoload};
use app\models\{Comment, Product, User};

//Подключаем автозагрузчик и конфиг
include "../config/config.php";
include "../engine/Autoload.php";

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product("1.png", "shoes", "nice boots", 32);
$product2 = new Product();

$user = new User();
$comment = new Comment();

$product = $product->insert();

var_dump($product);

$comment = $comment->getAll();

var_dump($comment);

echo "<hr>";

$product2 = $product2->getOne(17);

$prd = new Product("update_img");

$product2 = $prd->update(16);

var_dump($product2->getAll());

echo "<hr>";

var_dump($product->getAll());

$user = new User();

var_dump($user->getOne(1));

echo "<hr>";

//$product2 = $product2->getOne(17);
//var_dump($product2);
//
//$product2->delete();
//
//var_dump($product->getAll());