<?php

namespace app\models;

use app\engine\App;
use app\engine\Db;

abstract class Repository
{

    abstract protected function getTableName();

    abstract protected function getEntityClass();


    public function getLimit($limit)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return App::call()->db->queryLimit($sql, $limit);

    }

    public function getOneWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";
        return App::call()->db->queryOneObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function getCountWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE {$name} = :value";
        return App::call()->db->queryOne($sql, ['value' => $value])['count'];
    }

    public function save(Entity $entity)
    {
        ($entity->id == null) ? $this->insert($entity) : $this->update($entity);
    }

    public function insert(Entity $entity)
    {
        $tableName = $this->getTableName();
        $tableRow = [];
        $params = [];
        $sqlParametrs = [];

        foreach ($entity as $key => $value) {
            if ($key == 'id') continue;
            $tableRow[] = $key;
            $sqlParametrs[] = ":" . $key;
            $params[$key] = $value;
        }
//        array_pop($tableRow);
//        array_pop($sqlParametrs);
//        array_pop($params);
        $tableColumn = '`' . implode("`, `", $tableRow) . '`';
        $values = implode(", ", $sqlParametrs);

        $sql = "INSERT INTO {$tableName} ({$tableColumn}) VALUES ({$values})";
        App::call()->db->execute($sql, $params);
    }

    public function update(Entity $entity)
    {
        $sqlQuery = "";
        $tableName = $this->getTableName();
        $params = [];
        foreach ($entity->props as $prop => $newValue) {
            if ($newValue) {
                $params[] = $this->__get($prop);
                $sqlQuery .= "`" . $prop . '`' . " = " . "'" . $this->__get($prop) . "', ";
            }
        }
        $sqlQuery = substr_replace($sqlQuery, "", -2);

        $sql = "UPDATE {$tableName} SET {$sqlQuery} WHERE id = {$entity->id}";

        App::call()->db->execute($sql, $params);
        return $this;
    }


    public function delete(Entity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return App::call()->db->execute($sql, ['id' => $entity->id]);
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return App::call()->db->queryOneObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return App::call()->db->queryAll($sql);
    }
}