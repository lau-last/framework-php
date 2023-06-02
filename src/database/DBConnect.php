<?php

namespace App\database;

use PDO;

final class DBConnect
{
    private static ?PDO $pdo = null;

    public static function getPDO(): PDO
    {
        if (self::$pdo === null) {
            self::$pdo = new PDO('mysql:host=localhost:8889; dbname=blog;charset=utf8', 'root', 'root');
        }
        return self::$pdo;
    }
}