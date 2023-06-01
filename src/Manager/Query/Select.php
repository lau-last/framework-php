<?php

namespace App\Manager\Query;

final class Select
{
    private string $table;
    private array $value;
    private ?array $join = [];
    private ?array $where = [];
    private ?string $orderBy = null;


    public function toto()
    {
        $results = $manager->queryTruc(  // fetchAll(string $sqlQuery, array$params)
            (new Select("article", ["titre", "contenu"]))
                ->join(["user ON user.id = article.user_id"]) // MULTIPLE
                ->where("title LIKE %:title%", "coucou = coucou") // MULTIPLE : Comment multi-params en php sur une fonction, et itérer sur ceux ci
                ->orderBy("titre"),
            [ // partie BIND PARAM dans le manager.
                "title" => "Doit contenir ce truc"
            ]);

        foreach ($results as $result) {
            dump($result);
        }

    }

    public function __construct(string $table, array $value)
    {
        $this->table = $table;
        $this->value = $value;
    }

    public function __toString(): string
    {
        return 'SELECT ' . implode(', ', $this->value) . ' FROM ' . $this->table
            . (!empty($this->join) ? ' INNER JOIN ' . implode($this->join) : '')
            . ($this->where !== [] ? ' WHERE ' . implode( ' AND ', $this->where) : '')
            . ($this->orderBy !== null ? ' ORDER BY ' . $this->orderBy : '');
    }

    public function join(array $join): self
    {
        $this->join = $join;
        return $this;
    }

    public function where(string ...$where): self
    {
        foreach ($where as $arg) {
            $this->where[] = $arg;
        }
        return $this;
    }

    public function orderBy(string $orderBy): self
    {
        $this->orderBy = $orderBy;
        return $this;
    }

}