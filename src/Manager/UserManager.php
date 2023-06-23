<?php

namespace App\Manager;

use App\Entity\UserEntity;
use App\SessionBlog\SessionBlog;
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
            'password' => password_hash($input['password1'], PASSWORD_BCRYPT),
            'email' => $input['email']
        ]);
    }

    public static function userIsConnected(): bool
    {
        if (!empty((new SessionBlog())->get('name'))) {
            return true;
        }
        return false;
    }

    public static function userIsAdmin(): bool
    {
        if (self::userIsConnected() && (new SessionBlog())->get('role') == 'admin') {
            return true;
        }
        return false;
    }

    public function getUserInfo($info): ?self
    {
        $dataUser = (new Manager())->fetch((
        new Select('user', ['*']))
            ->where('email = :email'), ['email' => $info]);
        if (empty($dataUser)){return null;}
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