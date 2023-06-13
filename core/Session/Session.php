<?php

namespace Core\Session;

final class Session
{
    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            \session_start();
        }
    }

    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function delete($key)
    {
        unset($_SESSION[$key]);
    }

    public function destroy()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            \session_destroy();
        }
        return null;
    }

}