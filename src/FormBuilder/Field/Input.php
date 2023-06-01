<?php

namespace App\FormBuilder\Field;

final class Input
{
    private array $att;
    private bool $required = false;
    private string $type;
    private string $name;

    public function __construct(string $name, string $type = 'text', array $att = [])
    {
        $this->att = $att;
        $this->type = $type;
        $this->name = $name;
    }

    public function __toString(): string
    {
        $attribute = [];
        foreach ($this->att as $key => $value) {
            $attribute[] = sprintf('%s="%s"', $key, $value);
        }
        return sprintf('<input type="%s" name="%s" %s %s>', $this->type, $this->name, implode(' ', $attribute), $this->required ? 'required' : '');
    }

    public function required(): self
    {
        $this->required = true;
        return $this;
    }

}