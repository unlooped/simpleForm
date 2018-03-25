<?php

namespace SimpleForm;

class Form
{
    private $data = [];

    public function __construct(iterable $types)
    {
        $this->data = $types;
    }

    public static function create()
    {
        return new self([]);
    }

    public static function createFromArray(array $data): self
    {
        return new self($data);
    }

    public function add(FormTypeInterface $type)
    {
        $this->data[] = $type;
    }

    public function toJson(): string
    {
        return json_encode($this->data);
    }
}