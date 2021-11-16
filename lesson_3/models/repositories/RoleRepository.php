<?php

namespace app\models\repositories;

use app\models\entity\Product;
use app\models\Repository;
use app\models\Role;

class RoleRepository extends Repository
{

    protected function getTableName() {
        return 'roles';
    }

    protected function getEntityClass()
    {
        return Role::class;
    }
}