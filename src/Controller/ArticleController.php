<?php

namespace App\Controller;

use App\Entity\Article;
use Core\Controller\Controller;

final class ArticleController extends Controller
{
    protected string $template = 'base';
    protected string $viewPath = ROOT . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Html' . DIRECTORY_SEPARATOR;

    public function showAll()
    {
        $data = (new \Core\QueryBuilder\Manager())->fetchAll(new \Core\QueryBuilder\Select('article', ['*']));
        $articles = [];
        foreach ($data as $result) {
            $articles[] = new Article($result);
        }
        $this->render('showAll', \compact('articles'));
    }
}