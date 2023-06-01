<?php

namespace App\FormBuilder\Field;

final class Select
{
    private array $att;
    private bool $required = false;
    private string $name;

    public function __construct(string $name, array $att = [])
    {
        $this->att = $att;
        $this->name = $name;
    }

    public function start(): string
    {
        $attribute = [];
        foreach ($this->att as $key => $value) {
            $attribute[] = sprintf('%s="%s"', $key, $value);
        }
        return sprintf('<select name="%s" %s %s>', $this->name, implode(' ', $attribute), $this->required ? 'required' : '');
    }

    public function end(): string
    {
        return '</select>';
    }

    public function required(): self
    {
        $this->required = true;
        return $this;
    }

}