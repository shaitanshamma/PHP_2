<?php
session_start();
use app\engine\{Autoload, Render, TwigRender};
use app\models\{Comment, Product, User};

//Подключаем автозагрузчик и конфиг
include "../config/config.php";
include "../engine/Autoload.php";
require_once "../vendor/autoload.php";

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);
/** @var Product $product */

$controllerName = $_GET['c'] ?? 'product';
$actionName = $_GET['a'] ?? null;

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
} else {
    Die("404");
}

//
//$product = Product::getOne(20);
//$product->price = 77777;
//$product->title = "NEW";
//$product->save();
die();


$product = Product::getOne(7);
$product->delete();

var_dump($product);

var_dump($product->getAll());

$user = new User();

var_dump($user->getOne(1));

