<?php

namespace App\model;

final class User
{
    private int $id;
    private string $name;
    private string $password;
    private string $email;
    private string $role;

    public function setId(int $id): self
    {
        $this->id = intval($id);
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
            return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
            return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
            return $this;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
            return $this;
    }

}