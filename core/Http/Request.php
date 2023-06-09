<?php

namespace Core\Http;

final class Request
{
    private array $server;
    private ?array $post;
    private ?array $get;

    public function __construct()
    {
        $this->server = $_SERVER;
        $this->post = $_POST;
        $this->get = $_GET;
    }

    public function getUri(): string
    {
        return $this->server['REQUEST_URI'];
    }

    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function getPost(): ?array
    {
        return $this->post;
    }

    public function setPost(?array $post): self
    {
        $this->post = $post;
        return $this;
    }

    public function getGet(): ?array
    {
        return $this->get;
    }

    public function unsetPost()
    {
        unset($this->post);
    }

}