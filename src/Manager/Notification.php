<?php

namespace App\Manager;

use Core\QueryBuilder\Manager;
use Core\Session\Session;

final class Notification
{
    public static function notificationInvalidComment(): string
    {
        return implode((new Manager())->fetch(
            (new \Core\QueryBuilder\Select('comment', ['COUNT(validation)']))
                ->where('validation = "invalid"')));

    }

    public static function helloName()
    {
        return (new \Core\Session\Session())->get('name') ?? 'world';
    }

    public static function notificationConnection(): string
    {
        if((new UserManager())->userIsConnected()){
            return 'Connected';
        }
        return 'Offline';
    }

}