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
        $this->renderer->render('showAll', \compact('articles'));
    }

    public function show($id)
    {
        $request = new \Core\Http\Request();

        if($request->getMethod() == 'GET'){
            $article = (new ArticleModel())->getArticle($id);
            $comments = (new CommentModel())->getCommentFromArticle($id);
            $this->renderer->render('show', \compact('article', 'comments'));
        }
        if ($request->getMethod() == 'POST'){
            (new CommentModel())->createComment($request->getPost());
            $article = (new ArticleModel())->getArticle($id);
            $comments = (new CommentModel())->getCommentFromArticle($id);
            $this->renderer->render('show', \compact('article', 'comments'));
        }
    }
}