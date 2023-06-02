<?php

namespace App\model;

final class Hydrate
{
    public static function hydrate(array $array, $object)
    {
        $instance = new $object();
        foreach ($array as $key => $value) {
            $method = self::getSetter($key);
            if (method_exists($instance, $method)) {
                $instance->$method($value);
            }
        }
        return $instance;
    }

    private static function getSetter(string $name): string
    {
        return 'set' . join('', array_map('ucfirst', explode('_', $name)));
    }
}