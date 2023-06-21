<?php

namespace App\Controller;

use App\Manager\UserManager;
use Core\Controller\Controller;

final class UserController extends Controller
{
    public function showAllUser()
    {
        $users = (new UserManager())->getAllUsers();
        $this->renderer->render('management-user', compact('users'));
    }

    public function setAdmin($id)
    {
        (new UserManager())->setUserAdmin($id);
        header('Location: /user-management');
    }

    public function setUser($id)
    {
        (new UserManager())->setUserUser($id);
        header('Location: /user-management');
    }

    public function doDeleteUser($id)
    {
        (new UserManager())->deleteUser($id);
        header('Location: /user-management');

    }
}