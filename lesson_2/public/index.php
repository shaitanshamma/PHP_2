<?php

//Создаем псевдонимы классам
use app\models\{Products, Users, Basket, Feedbacks};
use app\engine\Db;
use app\models\figures\{Triangle, Rectangle, Circle};
//Подключаем автозагрузчик
include "../engine/Autoload.php";

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);

$db = new Db();

$product = new Products($db);

$users = new Users($db);

$feedbacks = new Feedbacks($db);

$basket = new Basket($db);

echo $product->getOne(2);
echo $product->getAll();

echo $users->getOne(1);
echo $users->getAll();

echo $basket->getOne(1);
echo $basket->getAll();

echo $feedbacks->getOne(1);
echo $feedbacks->getAll();

/*****/
echo "<hr>";

$circle = new Circle(3);
$circle ->info();
echo "<br>";
echo $circle ->perimeter() . "<br>";
echo $circle->square() . "<br>";

echo "<hr>";

$rectangle = new Rectangle(2, 3);
$rectangle ->info();
echo "<br>";
echo $rectangle ->perimeter() . "<br>";
echo $rectangle->square() . "<br>";

echo "<hr>";

$triangle = new Triangle(2, 3, 4, 5);
$triangle ->info();
echo "<br>";
echo $triangle ->perimeter() . "<br>";
echo $triangle->square() . "<br>";