<?php

namespace App\Model;

use App\database\DBConnect;
use PDO;

class Model
{
    public function read($id)
    {
        $stmt = DBConnect::getPDO()->prepare("SELECT * FROM article WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll(): array
    {
        $stmt = DBConnect::getPDO()->prepare("SELECT * FROM article");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}