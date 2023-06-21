<?php

namespace App\Manager;

use App\Entity\UserEntity;
use Core\QueryBuilder\Delete;
use Core\QueryBuilder\Insert;
use Core\QueryBuilder\Manager;
use Core\QueryBuilder\Select;
use Core\QueryBuilder\Update;
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

    public function getAllUsers(): array
    {
        $data = (new Manager())->fetchAll(new Select('user', ['*']));
        $users = [];
        foreach ($data as $res) {
            $users[] = new UserManager($res);
        }
        return $users;
    }

    public function setUserAdmin($id)
    {
        (new Manager())->queryExecute(
            (new Update('user'))
                ->set('user.role = "admin"')
                ->where('id = :id'), ['id' => $id[0]]
        );
    }

    public function setUserUser($id)
    {
        (new Manager())->queryExecute(
            (new Update('user'))
                ->set('user.role = "user"')
                ->where('id = :id'), ['id' => $id[0]]
        );
    }

    public function deleteUser($id)
    {
        (new Manager())->queryExecute(
            (new Delete('user'))
                ->where('id = :id'), ['id' => $id[0]]
        );
    }

}