<?php

namespace app\models\repositories;

use app\models\entity\Product;
use app\models\Repository;

class ProductRepository extends Repository
{

    protected function getTableName() {
        return 'products';
    }

    protected function getEntityClass()
    {
        return Product::class;
    }
}