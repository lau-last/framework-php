<?php

namespace App\Controller;

use Core\Controller\Controller;

final class ArticleController extends Controller
{
    public function showAll()
    {
        echo $this->render->render('posts');
    }
}