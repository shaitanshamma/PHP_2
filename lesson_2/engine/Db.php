<?php

namespace app\engine;

class Db
{
    //SELECT from users where id = 1
    public function queryOne($sql)
    {
        return $sql . "<br>";
    }

    //SELECT from users
    public function queryAll($sql)
    {
        return $sql . "<br>";
    }
}