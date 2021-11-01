<?php

namespace app\models;

class Role extends DbModel
{
    public $id;
    public $title;


    public function __construct($title = null)
    {
        $this->title = $title;
    }


    public static function getTableName()
    {
        return 'roles';
    }

}