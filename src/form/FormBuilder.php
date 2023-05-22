<?php

namespace App\form;

class FormBuilder
{
    public array $fields;

    public function __construct()
    {
        $this->fields = [];
    }

    public function addFieldsInput(string $for, string $label, string $type, string $name): FormBuilder
    {
        $input = '<label for="' . $for . '">' . $label . '</label>
        <input type="' . $type . '" id="' . $for . '" name="' . $name . '">';
        $this->fields[] = $input;
        return $this;
    }

    public function addFieldsTextarea(string $for, string $label, string $name): FormBuilder
    {
        $textarea = '<label for="' . $for . '">' . $label . '</label>
        <textarea id="' . $for . '" name="' . $name . '"></textarea>';
        $this->fields[] = $textarea;
        return $this;
    }

//    public function addFieldsSelect(string $for, string $label, string $name, array $options): void
//    {
//        $selects = '<label for="' . $for . '">' . $label . '</label>
//        <select id="' . $for . '" name="' . $name . '">';
//        foreach ($options as $key => $value) {
//            $selects .= '<op';
//        }
//    }
    public function render(): void
    {
         echo implode($this->fields);
    }


}