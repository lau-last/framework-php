<?php

namespace App\tool;

final class Server
{
    public static function getUri(): ?string
    {
        return $_SERVER['REQUEST_URI'] ?? null;
    }
}