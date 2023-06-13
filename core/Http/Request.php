<?php

namespace Core\Http;

final class Request
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

//    public static function global(): self
//    {
//        return new self($_SERVER, $_GET, $_POST);
//    }

    public function getUri(): string
    {
        return $this->server['REQUEST_URI'];
    }

    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function getGet(): array
    {
        return $this->get;
    }

    public function getPost(): array
    {
        return $this->post;
    }


}