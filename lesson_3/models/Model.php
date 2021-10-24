<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{


    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }


    abstract public function getTableName();

    //CRUD Active Record

    public function insert()
    {
        $tableName = $this->getTableName();
        $tableRow = [];
        $params = [];
        $sqlParametrs = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $tableRow[] = $key;
            $sqlParametrs[] = ":" . $key;
            $params[$key] = $value;
        }
        $tableColumn = '`' . implode("`, `", $tableRow) . '`';
        $values = implode(", ", $sqlParametrs);

        $sql = "INSERT INTO {$tableName} ({$tableColumn}) VALUES ({$values})";

        var_dump($sql);

        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();

        return $this;
    }


    public function delete()
    {
        $id = $this->id;
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $id]);

    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], get_called_class());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAllObj($sql, [], get_called_class());
    }

    public function update($id)
    {
        $tableName = $this->getTableName();

        $sqlQuery = "";

        foreach ($this as $key => $value) {
            if ($value == null) continue;
            $sqlQuery = "`" . $key . '`' . " = " . "'" . $value . "'";
        }

        $sql = "UPDATE {$tableName} SET {$sqlQuery} WHERE id = {$id}";

        Db::getInstance()->execute($sql);

        return $this;
    }

}