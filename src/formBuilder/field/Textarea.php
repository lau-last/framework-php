<?php

namespace App\formBuilder\field;

final class Textarea
{
    private array $att;
    private bool $required;

    public function __construct(array $att = [], bool $required = false)
    {
        $this->att = $att;
        $this->required = $required;
    }

    public function __toString(): string
    {
        $attribute = [];
        foreach ($this->att as $key => $value) {
            $attribute[] = sprintf('%s="%s"', $key, $value);
        }
        return sprintf('<textarea %s %s></textarea>', implode(' ', $attribute), $this->required ? 'required' : '');
    }
}