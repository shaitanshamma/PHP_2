<?php

use app\engine\Db;
use app\engine\Request;
use app\models\repositories\CartRepository;
use app\models\repositories\CommentRepository;
use app\models\repositories\OrderRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\RoleRepository;
use app\models\repositories\UserRepository;

define('ROOT', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);
define('CONTROLLER_NAMESPACE', 'app\\controllers\\');
define("VIEWS_DIR", '../templates/');

return [
    'root' => dirname(__DIR__),
    'controllers_namespaces' => 'app\\controllers\\',
    'product_per_page' => 2,
//    'views_dir' => dirname(__DIR__) . "/views/",
    'views_dir' => dirname(__DIR__) . "/templates/",
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '12345',
            'database' => 'store',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'cartRepository' => [
            'class' => CartRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'usersRepository' => [
            'class' => UserRepository::class
        ],
        'orderRepository' => [
            'class' => OrderRepository::class
        ],
        'commentRepository' => [
            'class' => CommentRepository::class
        ],
        'roleRepository' => [
            'class' => RoleRepository::class
        ],
    ]

];