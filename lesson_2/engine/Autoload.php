<?php

class Autoload
{
    public function loadClass($className)
    {
        $fileName = str_replace('\\', '/', $className);
        $count = 1;
        $fileName = str_replace('app/', '../', $fileName, $count) . ".php";
        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}