<?php

namespace App\Model\query;

final class Select
{
    private string $table;
    private array $value;
    private ?string $join = null;
    private ?string $where = null;
    private ?string $orderBy = null;


    public function toto()
    {
        $results = $manager->queryTruc(  // fetchAll(string $sqlQuery, array$params)
            (new Select("article", ["titre", "contenu"]))
                ->join("user ON user.id = article.user_id") // MULTIPLE
                ->where("title LIKE %:title%") // MULTIPLE : Comment multi-params en php sur une fonction, et itérer sur ceux ci
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
            . ($this->join !== null ? 'INNER JOIN ' . $this->join : '')
            . ($this->where !== null ? 'WHERE ' . $this->where : '')
            . ($this->orderBy !== null ? 'ORDER BY ' . $this->orderBy : '');
    }

    public function join(string $join): self
    {
        $this->join = $join;
        return $this;
    }

    public function where(string $where): self
    {
        $this->where = $where;
        return $this;
    }

    public function orderBy(string $orderBy): self
    {
        $this->orderBy = $orderBy;
        return $this;
    }

}