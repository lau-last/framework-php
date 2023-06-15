<?php

namespace App\Entity;

use Core\Entity\Entity;

final class Article extends Entity
{
    private int $id;
    private string $title;
    private string $head;
    private string $content;
    private string $date;
    private int $userId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getHead(): string
    {
        return $this->head;
    }

    public function setHead(string $head): self
    {
        $this->head = $head;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function getUrl(): string
    {
        return '/articles/' . $this->id;
    }

    public function getExtract():string
    {
        return \substr($this->content, 0, 250) . '...';
    }
}