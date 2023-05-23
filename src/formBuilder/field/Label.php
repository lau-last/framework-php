<?php

namespace App\formBuilder\field;

final class Label
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
        return sprintf('<label %s>%s</label>', implode(' ', $attribute), $this->label);
    }

}