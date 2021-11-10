<?php

namespace app\models;

class Role extends Entity
{
    public $id;
    public $title;


    public function __construct($title = null)
    {
        $this->title = $title;
    }

}