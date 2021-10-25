<?php

namespace app\engine;

use app\traits\TSingletone;

class Db
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost:3306',
        'login' => 'root',
        'password' => '12345',
        'database' => 'store',
        'charset' => 'utf8'
    ];

    use TSingletone;

    private $connection = null; //PDO

    private function getConnection() {
        if (is_null($this->connection)) {
            $this->connection = new \PDO($this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']);
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
     }

     private function prepareDsnString() {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
     }

     private function query($sql, $params) {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
     }

     public function lastInsertId() {
         return $this->getConnection()->lastInsertId();
     }


    //SELECT from users where id = '1' LIMIT 0, 1
    public function queryOne($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryOneObject($sql, $params, $class)
    {
        $stmt = $this->query($sql, $params);

        $stmt->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, $class);
        return $stmt->fetch();
    }

    //SELECT from users
    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function queryAllObj($sql, $params = [], $class)
    {
        $stmt = $this->query($sql, $params);

        $stmt->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, $class);
        return $stmt->fetchAll();
    }

    public function execute($sql, $params = []) {
        return $this->query($sql, $params)->rowCount();
    }
}