<?php

namespace App\Tool\FormBuilder\field;

final class Textarea
{
    private array $att;
    private bool $required = false;
    private string $name;

    public function __construct(string $name, array $att = [])
    {
        $this->att = $att;
        $this->name = $name;
    }

    public function __toString(): string
    {
        $attribute = [];
        foreach ($this->att as $key => $value) {
            $attribute[] = sprintf('%s="%s"', $key, $value);
        }
        return sprintf('<textarea name="%s" %s %s></textarea>', $this->name, implode(' ', $attribute), $this->required ? 'required' : '');
    }

    public function required(): self
    {
        $this->required = true;
        return $this;
    }
}