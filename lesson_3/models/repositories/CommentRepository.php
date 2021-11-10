<?php

namespace app\models\repositories;

use app\models\Comment;
use app\models\entity\Product;
use app\models\Repository;
use app\models\Role;

class CommentRepository extends Repository
{

    protected function getTableName() {
        return 'comments';
    }

    protected function getEntityClass()
    {
        return Comment::class;
    }
}