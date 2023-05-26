<?php

namespace App\Model\Repositories;

class ArticleRepository
{
    public function getAll(): string
    {
        return 'SELECT * FROM article';
    }
}