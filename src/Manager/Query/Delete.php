<?php

namespace App\Manager\Query;

final class Delete
{
    private string $table;
    private string $where;

    public function __construct(string $table)
    {
        $this->table = $table;
    }
    public function __toString(): string
    {
        return 'DELETE FROM ' . $this->table . ' WHERE ' . $this->where;
    }
    public function where(string $where): self
    {
        $this->where = $where;
        return $this;
    }
}