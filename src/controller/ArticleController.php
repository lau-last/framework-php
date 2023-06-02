<?php

namespace App\controller;

use App\manager\Model;

class ArticleController
{
    public function show(array $params): void
    {
        dump((new Model())->read($params[0]));
    }

    public function showAll(): void
    {
        dump((new Model())->getAll());

    }
}