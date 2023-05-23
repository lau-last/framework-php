<?php

namespace App\formBuilder\field;

final class Select
{
    private array $att;
    private bool $required;

    public function __construct(array $att = [],bool $required = false)
    {
        $this->att = $att;
        $this->required = $required;
    }

    public function start(): string
    {
        $attribute = [];
        foreach ($this->att as $key => $value) {
            $attribute[] = sprintf('%s="%s"', $key, $value);
        }
        return sprintf('<select %s %s>', implode(' ', $attribute), $this->required ? 'required' : '');
    }

    public function end(): string
    {
        return '</select>';
    }

}