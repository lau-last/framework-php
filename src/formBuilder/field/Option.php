<?php

namespace App\formBuilder\field;

final class Option
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
        return sprintf('<option %s>%s</option>', implode(' ', $attribute), $this->label);
    }
}