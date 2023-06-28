<?php

namespace App\Controller;

use App\Manager\FormManager\FormChangePassword;
use App\Manager\UserManager;
use App\SessionBlog\SessionBlog;
use Core\Controller\Controller;
use Core\Http\Request;

final class UserController extends Controller
{
    public function showAllUser()
    {
        $users = (new UserManager())->getAllUsers();
        UserManager::userIsAdmin() ?
            $this->renderer->render('management-user', compact('users')) :
            header('Location: /403');
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

    public function setValid($token)
    {
        $user = (new UserManager())->getUserExpByToken($token);
        $exp = $user->getExpirationDate();

        if ($exp > strtotime('now')) {
            (new UserManager())->setUserValid($token);
            $errors[] = 'Your account has been successfully validated.';
            $this->renderer->render('connection', compact('errors'));
            exit();
        }

        (new UserManager())->deleteUserByToken($token);
        $errors[] = 'The link has expired. You have to recreate a registration';
        $this->renderer->render('connection', compact('errors'));
    }

    public function showProfile()
    {
        $sessionEmail = (new SessionBlog())->get('email');
        $userSession = (new UserManager())->getUserInfo($sessionEmail);
        UserManager::userIsConnected() ?
            $this->renderer->render('profile', compact('userSession')) :
            header('Location: /403');
    }

    public function changePassword($id)
    {
        $request = new Request();
        $password = new FormChangePassword();
        $errors = $password->isValid($request->getPost());
        $sessionEmail = (new SessionBlog())->get('email');
        $userSession = (new UserManager())->getUserInfo($sessionEmail);
        if (!empty($errors)) {
            $this->renderer->render('profile', compact('errors', 'userSession'));
            exit();
        }
        (new UserManager())->updateNewPassword($request->getPost(), $id);
        $errors[] = 'Your password has been updated';
        $this->renderer->render('profile', compact('errors', 'userSession'));
    }
}