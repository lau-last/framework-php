<?php

namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use Core\Controller\Controller;


final class ArticleController extends Controller
{

    public function showAll()
    {
        $articles = (new ArticleModel())->getArticles();
        $this->renderer->render('article.showAll', \compact('articles'));
    }

    public function show($id)
    {
        $article = (new ArticleModel())->getArticle($id);
        $comments = (new CommentModel())->getCommentFromArticle($id);
        $this->renderer->render('article.show', \compact('article', 'comments'));
    }
}