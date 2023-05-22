<?php

namespace App\database;

use PDO;

class DBConnect
{
    private static ?PDO $pdo = null;

    public static function getPDO(): PDO
    {
        if (self::$pdo === null) {
            self::$pdo = new PDO('mysql:host=localhost:8889;dbname=framework;charset=utf8', 'root', 'root');
        }
        return self::$pdo;
    }
}