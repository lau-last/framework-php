<?php

namespace App\model;

final class Comment
{
    private int $id;
    private string $content;
    private string $date;
    private string $validation;
    private int $user_id;
    private int $article_id;


    public function setId(int $id): self
    {
        $this->id = intval($id);
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

    public function setValidation(string $validation): self
    {
        $this->validation = $validation;
        return $this;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = intval($user_id);
        return $this;
    }

    public function setArticleId(int $article_id): self
    {
        $this->article_id = intval($article_id);
        return $this;
    }


}