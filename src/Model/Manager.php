<?php

namespace App\Model;

use App\database\DBConnect;
use PDO;

class Manager
{
    public function fetch(string $query, array $param = [])
    {
        $stmt = DBConnect::getPDO()->prepare($query);
        foreach ($param as $key => $value){
            $stmt->bindParam(':' . $key, $value);
        }
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll(string $query): bool|array
    {
        $stmt = DBConnect::getPDO()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}