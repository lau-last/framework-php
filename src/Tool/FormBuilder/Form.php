<?php

namespace App\Tool\FormBuilder;

final class Form
{
    private array $att;

    public function __construct(array $att = [])
    {
        $this->att = $att;
    }

    public function start(): string
    {
        $attribute = [];
        foreach ($this->att as $key => $value) {
            $attribute[] = sprintf('%s="%s"', $key, $value);
        }
        return sprintf('<form %s>', implode(' ', $attribute));
    }

    public function end(): string
    {
        return '</form>';
    }

    public static function postIsEmpty(): bool
    {
        if(empty($_POST)){
            return true;
        }
        return false;
    }

    public static function showPost(): array
    {
        return $_POST;
    }

}