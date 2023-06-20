<?php

namespace Core\FormBuilder;

final class Textarea
{
    private array $att;
    private bool $required = false;
    private string $name;
    private string $text;

    public function __construct(string $name, array $att = [], string $text = '')
    {
        $this->att = $att;
        $this->name = $name;
        $this->text = $text;
    }

    public function __toString(): string
    {
        $attribute = [];
        foreach ($this->att as $key => $value) {
            $attribute[] = sprintf('%s="%s"', $key, $value);
        }
        return sprintf('<textarea name="%s" %s %s>%s</textarea>', $this->name, implode(' ', $attribute), $this->required ? 'required' : '', $this->text);
    }

    public function required(): self
    {
        $this->required = true;
        return $this;
    }
}