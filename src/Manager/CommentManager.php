<?php

namespace App\Manager;

use App\Entity\CommentEntity;
use Core\Http\Request;
use Core\QueryBuilder\Insert;
use Core\QueryBuilder\Manager;
use Core\QueryBuilder\Select;
use Core\Session\Session;

final class CommentManager extends CommentEntity
{
    private string $author;

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
            $comments[] = new CommentManager($result);
        }
        return $comments;
    }

    public function createComment(array $input, int $articleId)
    {
        $userId = (new Session())->get('id');
        (new Manager())->queryExecute(
            new Insert('comment', ['content', 'user_id', 'article_id']), [
            'content' => trim($input['comment']),
            'user_id' => $userId,
            'article_id' => $articleId
        ]);
    }

}