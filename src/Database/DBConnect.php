<?php

namespace App\Database;

use PDO;

final class DBConnect
{
    private static ?PDO $pdo = null;

    public static function getPDO(): PDO
    {
        if (self::$pdo === null) {
            self::$pdo = new PDO('mysql:host=192.168.33.10:8080; dbname=framework;charset=utf8', 'root', 'root');
        }
        return self::$pdo;
    }
}