<?php

namespace App\Model;

use Core\Entity\Entity;
use Core\QueryBuilder\Insert;
use Core\QueryBuilder\Manager;
use Core\QueryBuilder\Select;
use Core\Session\Session;

final class UserModel extends Entity
{
    private int $id;
    private string $name;
    private string $password;
    private string $email;
    private string $role;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function UserRegistration(array $input)
    {
        (new Manager())->queryExecute(
            new Insert('user', ['name', 'password', 'email']), [
            'name' => $input['name'],
            'password' => md5($input['password1']),
            'email' => $input['email']
        ]);
    }

    public function userIsConnected(): bool
    {
        if (!empty((new Session())->get('member'))) {
            return true;
        }
        return false;
    }

    public function userIsAdmin(): bool
    {
        if ($this->userIsConnected() && (new Session())->get('role') == 'admin') {
            return true;
        }
        return false;
    }

    public function getUserInfo($info): self
    {
        $dataUser = (new Manager())->fetch((
        new Select('user', ['*']))
            ->where('email = :email'), ['email' => $info]);
        return new UserModel($dataUser);
    }

}