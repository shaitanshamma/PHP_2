<?php

namespace app\models;

use app\engine\Db;

abstract class DbModel extends Model
{

    abstract static public function getTableName();


    public static function getLimit($limit)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit);

    }

    public static function getName($name)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `login` = :name";
        return Db::getInstance()->queryOneObject($sql, ["name" => $name], static::class);
    }

    public function insert()
    {
        $tableName = static::getTableName();
        $tableRow = [];
        $params = [];
        $sqlParametrs = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $tableRow[] = $key;
            $sqlParametrs[] = ":" . $key;
            $params[$key] = $value;
        }
        array_pop($tableRow);
        array_pop($sqlParametrs);
        array_pop($params);
        $tableColumn = '`' . implode("`, `", $tableRow) . '`';
        $values = implode(", ", $sqlParametrs);

        $sql = "INSERT INTO {$tableName} ({$tableColumn}) VALUES ({$values})";

        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();

        return $this;
    }

    public function update()
    {
        $sqlQuery = "";
        $tableName = static::getTableName();
        $params = [];
        foreach ($this->props as $prop => $newValue) {
            if ($newValue) {
                $params[] = $this->__get($prop);
                $sqlQuery .= "`" . $prop . '`' . " = " . "'" . $this->__get($prop) . "', ";
            }
        }
        $sqlQuery = substr_replace($sqlQuery, "", -2);

        $sql = "UPDATE {$tableName} SET {$sqlQuery} WHERE id = {$this->id}";

        Db::getInstance()->execute($sql, $params);
        return $this;
    }

    public function save()
    {
        ($this->id == null) ? $this->insert() : $this->update();
    }

    public function delete($id)
    {
        $session_uid = session_id();
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE `prod_id` = :id AND `session_uid` = '{$session_uid}'";
//        var_dump($sql, $id);
//        die();
        return Db::getInstance()->execute($sql, ['id' => $id]);
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public static function getCountWhere($name, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE {$name} = :value";
        return Db::getInstance()->queryOne($sql, ['value' => $value])['count'];
    }
}