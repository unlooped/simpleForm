<?php

namespace SimpleForm;

interface FormTypeInterface
{
    public static function createFromArray(array $arr);

    public function getRequiredFields(): array;
}
