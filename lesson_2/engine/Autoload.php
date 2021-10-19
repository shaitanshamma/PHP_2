<?php

class Autoload
{
//    private $path = [
//        'models',
//        'engine',
//        'interfaces'
//    ];

    public function loadClass($className)
    {

//    //$className = app\models\Product
//        //$fileName = ../models/Product.php
//        //TODO убрать цикл и массив
//        foreach ($this->path as $path) {
//           $fileName = "../{$path}/{$className}.php";
//            //TODO развернуть слеши И заменить app\ на ../ str_replace
//           // $fileName = "../{$className}.php";
//            //var_dump($fileName);
//            if (file_exists($fileName)) {
//                include  $fileName;
//                break;
//            }
//        }
//            $fileName = "../{$path}/{$className}.php";
//            $fileName = "../{$path}/{$className}.php";
        var_dump($className);
        $fileName = str_replace('\\', '/', $className);
        $count = 1;
        $fileName = str_replace('app/', '../', $fileName, $count) . ".php";
        var_dump($fileName);
            //TODO развернуть слеши И заменить app\ на ../ str_replace
            // $fileName = "../{$className}.php";
            //var_dump($fileName);
            if (file_exists($fileName)) {
                include  $fileName;
            }
        }


}