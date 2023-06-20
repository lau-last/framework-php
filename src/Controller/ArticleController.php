<?php

namespace App\Controller;

use App\Manager\CommentManager;
use App\Manager\ArticleManager;
use Core\Controller\Controller;
use Core\Http\Request;

final class ArticleController extends Controller
{

    public function showAll()
    {
        $articles = (new ArticleManager())->getArticles();
        $this->renderer->render('show-all-articles', \compact('articles'));
    }

    public function show($id)
    {
        $article = (new ArticleManager())->getArticle($id);
        $comments = (new CommentManager())->getCommentFromArticle($id);
        $this->renderer->render('show-article', \compact('article', 'comments'));
    }

    public function postArticle()
    {
        $request = new Request();
        (new ArticleManager())->createArticle($request->getPost());
        header('Location:/articles');
    }
}