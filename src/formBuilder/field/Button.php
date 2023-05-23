<?php

namespace App\formBuilder\field;

final class Button
{
    private string $label;
    private array $att;

    public function __construct(string $label, array $att = [])
    {
        $this->label = $label;
        $this->att = $att;
    }

    public function __toString(): string
    {
        $attribute = [];
        foreach ($this->att as $key => $value) {
            $attribute[] = sprintf('%s="%s"', $key, $value);
        }
        return sprintf('<button %s>%s</button>', implode(' ', $attribute), $this->label);
    }
}