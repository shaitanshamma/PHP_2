<?php

namespace app\models;

class Feedbacks extends Model
{
    public $id;
    public $author;
    public $text;


    public function getTableName()
    {
        return 'feedback';
    }

}