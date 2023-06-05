<?php

namespace App\Http;

class Request
{
    private array $server;
    private array $get;
    private array $post;

    public function __construct(array $server, array $get = [], array $post = [])
    {
        $this->server = $server;
        $this->get = $get;
        $this->post = $post;
    }

    public static function global() :self
    {
        return new self($_SERVER, $_GET, $_POST);
    }

    public function getUri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}