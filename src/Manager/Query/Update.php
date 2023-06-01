<?php

namespace App\Manager\Query;

final class Update
{
    private string $table;
    private string $set;
    private string $where;

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function __toString(): string
    {
        return 'UPDATE ' . $this->table . ' SET ' . $this->set . ' WHERE ' . $this->where;
    }

    public function set(string $set): self
    {
        $this->set = $set;
        return $this;
    }
    public function where(string $where): self
    {
        $this->where = $where;
        return $this;
    }
}