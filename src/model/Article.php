<?php

namespace App\model;

final class Article
{
    private int $id;
    private string $title;
    private string $head;
    private string $content;
    private string $date;
    private int $user_id;

    public function setId(int $id): self
    {
        $this->id = intval($id);
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setHead(string $head): self
    {
        $this->head = $head;
        return $this;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = intval($user_id);
        return $this;
    }

}