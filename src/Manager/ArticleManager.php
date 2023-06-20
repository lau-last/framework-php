<?php

namespace App\Manager;

use App\Entity\ArticleEntity;
use Core\QueryBuilder\Manager;
use Core\QueryBuilder\Select;

final class ArticleManager extends ArticleEntity
{

    public function getUrl(): string
    {
        return '/articles/' . $this->id;
    }

    public function getExtract():string
    {
        return \substr($this->content, 0, 250) . '...';
    }

    public function getArticles(): array
    {
        $data = (new Manager())->fetchAll(new Select('article', ['*']));
        $articles = [];
        foreach ($data as $result) {
            $articles[] = new ArticleManager($result);
        }
        return $articles;
    }

    public function getArticle($id): self
    {
        $dataArticle = (new Manager())->fetch((
            new Select('article', ['*']))
            ->where('id = :id'), ['id' => $id[0]]);
        return new ArticleManager($dataArticle);
    }
}