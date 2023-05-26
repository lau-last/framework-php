<?php

namespace App\Model;

use App\database\DBConnect;
use PDO;

class Manager
{
    public function fetch(string $query)
    {
        $stmt = DBConnect::getPDO()->prepare("$query");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll(string $query): bool|array
    {
        $stmt = DBConnect::getPDO()->prepare("$query");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function execute(string $query): bool
    {
        $stmt = DBConnect::getPDO()->prepare("$query");
        return $stmt->execute();
    }

}