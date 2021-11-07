<?php
session_start();

use app\engine\{Autoload, Db, Render, Request, RequestException, TwigRender};
use app\models\{Product, User};

//Подключаем автозагрузчик и конфиг
include "../config/config.php";
//include "../engine/Autoload.php";
require_once '../vendor/autoload.php';

//регистрируем автозагрузчик
//spl_autoload_register([new Autoload(), 'loadClass']);

try {
    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new TwigRender());
        $controller->runAction($actionName);
    } else {
        Die("404");
    }

} catch (\PDOException $e) {
    var_dump($e);
} catch (\Exception $e) {
    var_dump($e->getTrace());
}








die();



/** @var Product $product */


$product = Product::getOne(1);
$product->price = 23; //SET price = 23
$product->name = 'azaza'; //SET price = 23
$product->save();





$product = Product::getOne(8);
var_dump($product);


$product = Product::getOne(8);
$product->price = 23; //SET price = 23
$product->save();

$product = new Product("Чай", "Цейлонский", 54);
$product->save();
var_dump($product);


$product = Product::getOne(7);
$product->delete();

var_dump($product);

var_dump($product->getAll());

$user = new User();

var_dump($user->getOne(1));



//var_dump($product);


