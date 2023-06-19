<?php

namespace App\Model;

use Core\Entity\Entity;
use Core\Http\Request;
use Core\QueryBuilder\Insert;
use Core\QueryBuilder\Manager;
use Core\QueryBuilder\Select;
use Core\Session\Session;

final class CommentModel extends Entity
{
    private int $id;

    private string $content;
    private string $date;
    private string $validation;
    private int $userId;

    private string $author;

    private int $articleId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
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

    public function getValidation(): string
    {
        return $this->validation;
    }

    public function setValidation(string $validation): self
    {
        $this->validation = $validation;
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

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function setArticleId(int $articleId): self
    {
        $this->articleId = $articleId;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }

    public function getCommentFromArticle($id): array
    {
        $dataComment = (new Manager())->fetchAll((
        new Select('comment AS c', ['c.content, c.date, u.name AS author']))
            ->join('user AS u ON c.user_id = u.id')
            ->where('article_id = :article_id')
            ->orderBy('c.date DESC'), ['article_id' => $id[0]]);
        $comments = [];
        foreach ($dataComment as $result) {
            $comments[] = new CommentModel($result);
        }
        return $comments;
    }

    public function createComment($input)
    {
        $userId = (new Session())->get('id');
        $articleId = $this->getFirstParamsUrl();
        $dataComment = (new Manager())->queryExecute(
            new Insert('comment', ['content', 'user_id', 'article_id']), [
            'content' => trim($input['comment']),
            'user_id' => $userId,
            'article_id' => $articleId
        ]);
    }

    private function getFirstParamsUrl()
    {
        $matches = [];
        preg_match('([0-9]+)', (new Request())->getUri(), $matches);
        return $matches[0];
    }

//    public function getCommentByUserName()
//    {
//        $dataUser = (new )
//    }
}