<?php

namespace app\models\repositories;

use app\models\entity\Order;
use app\models\Repository;

class OrderRepository extends Repository
{

    protected function getTableName() {
        return 'orders';
    }

    protected function getEntityClass()
    {
        //TODO при желании попробуйте через static::class в родителе
        return Order::class;
    }
}