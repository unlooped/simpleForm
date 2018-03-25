<?php

namespace SimpleForm;

class MissingFieldsException extends \Exception
{
    public function __construct(array $fields, int $code = 0, Throwable $previous = null)
    {
        parent::__construct('"' . implode('", "', array_unique($fields)) . '" field(s) are required', $code, $previous);
    }

}
