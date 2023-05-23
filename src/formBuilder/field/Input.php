<?php

namespace App\formBuilder\field;

final class Input
{
    private array $att;
    private bool $required = false;

    public function __construct(array $att = [])
    {
        $this->att = $att;
    }

    public function __toString(): string
    {
        $attribute = [];
        foreach ($this->att as $key => $value) {
            $attribute[] = sprintf('%s="%s"', $key, $value);
        }
        return sprintf('<input %s %s>', implode(' ', $attribute), $this->required ? 'required' : '');
    }

    public function required(): self  {
        $this->required = true;
        return $this;
    }

}