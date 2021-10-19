<?php

//Создаем псевдонимы классам
use app\models\{Products, Users};
use app\engine\Db;
//Подключаем автозагрузчик
include "../engine/Autoload.php";

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);

$db = new Db();

$product = new Products($db);

$product->name = "Чай";
var_dump($product->name);

$users = new Users($db);

echo $product->getOne(2);
echo $product->getAll();

echo $users->getOne(1);
echo $users->getAll();

//var_dump($product);


