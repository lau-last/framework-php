<?php

namespace App\Core\Controller;

use App\Controller\Controller;

final class ArticleController extends Controller
{
    public function showAll()
    {
        echo $this->render->render('posts');
    }
}