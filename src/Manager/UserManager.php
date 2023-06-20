<?php

namespace App\Manager;

use App\Entity\UserEntity;
use Core\QueryBuilder\Insert;
use Core\QueryBuilder\Manager;
use Core\QueryBuilder\Select;
use Core\Session\Session;

final class UserManager extends UserEntity
{

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
        return new UserManager($dataUser);
    }

}