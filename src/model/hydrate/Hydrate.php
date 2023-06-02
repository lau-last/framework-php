<?php

namespace App\model\hydrate;

use App\manager\Manager;

class Hydrate
{
    public function hydrateUser(): array
    {
        $select = new \App\manager\query\Select('article', ['*']);
        return (new Manager())->fetchAll($select);
    }
}