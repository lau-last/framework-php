<?php

namespace App\Model;

use App\database\DBConnect;
use PDO;

final class Manager
{

    public function queryExecute(string $query, array $param = []): bool|\PDOStatement
    {
        $stmt = DBConnect::getPDO()->prepare($query);
        if ($param !== []) {
            foreach ($param as $key => $value) {
                $stmt->bindParam(':' . $key, $value);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function fetch(string $query, array $param = [])
    {
        $stmt = $this->queryExecute($query, $param);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll(string $query, array $param = []): bool|array
    {
        $stmt = $this->queryExecute($query, $param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}