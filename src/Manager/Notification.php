<?php

namespace App\Manager;

use Core\QueryBuilder\Manager;

final class Notification
{
    public static function notificationInvalidComment(): string
    {
        return implode((new Manager())->fetch(
            (new \Core\QueryBuilder\Select('comment', ['COUNT(validation)']))
                ->where('validation = "invalid"')));

    }
}