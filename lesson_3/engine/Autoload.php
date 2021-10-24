<?php

namespace app\engine;

class Autoload
{


    public function loadClass($className)
    {

        $count = 1;
        $fileName = str_replace('\\', DS, $className);
        $fileName = str_replace('app\\', ROOT . DS, $className, $count) . ".php";

        if (file_exists($fileName)) {
            include $fileName;
        }
    }

}