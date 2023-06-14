<?php

namespace Core\Entity;

abstract class Entity
{
    public function __construct(?array $data = [])
    {
        if (!empty($data)) {
            $this->Hydrate($data);
        }
    }

    public function Hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}