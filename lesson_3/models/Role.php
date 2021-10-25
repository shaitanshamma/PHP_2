<?php

namespace app\models;

class Role extends Model
{
    public $id;
    public $title;


    public function __construct($title = null)
    {
        $this->title = $title;
    }


    public function getTableName()
    {
        return 'roles';
    }

}