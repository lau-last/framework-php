<?php

namespace App\SessionBlog;

use App\Manager\UserManager;
use Core\Session\Session;

final class SessionBlog extends Session
{
    public function __construct(?UserManager $userInfo = null)
    {
        if ((!empty($userInfo))) {
            $this->set('id', $userInfo->getId());
            $this->set('name', $userInfo->getName());
            $this->set('email', $userInfo->getEmail());
            $this->set('role', $userInfo->getRole());
        }
    }
}