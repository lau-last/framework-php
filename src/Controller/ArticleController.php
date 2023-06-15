<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use Core\Controller\Controller;
use Core\QueryBuilder\Manager;
use Core\QueryBuilder\Select;

final class ArticleController extends Controller
{
    public function showAll()
    {
        $data = (new Manager())->fetchAll(new Select('article', ['*']));
        $articles = [];
        foreach ($data as $result) {
            $articles[] = new Article($result);
        }
        $this->renderer->render('article.showAll', \compact('articles'));
    }

    public function show($id)
    {
        $dataArticle = (new Manager())->fetch((new Select('article', ['*']))->where('id = :id'), ['id'=>$id[0]]);
        $dataComment = (new Manager())->fetchAll((new Select('comment', ['*']))->where('article_id = :article_id'), ['article_id'=>$id[0]]);
        $article = new Article($dataArticle);
        $comments = [];
        foreach ($dataComment as $result) {
            $comments[] = new Comment($result);
        }
//        dd($comments);
        $this->renderer->render('article.show', \compact('article', 'comments'));
    }
}