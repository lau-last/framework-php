<?php

namespace App\controller;

class HomeController
{
    public function showHome(): void
    {
        require_once '../src/template/base.html';
    }
}