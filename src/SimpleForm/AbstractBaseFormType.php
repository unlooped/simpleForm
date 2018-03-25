<?php

namespace SimpleForm;

abstract class AbstractBaseFormType implements FormTypeInterface
{

    public $typeName;
    public $name = '';
    public $label = '';
    public $type;
    public $required = false;
    public $headline = '';
    public $info = '';

    private $_requiredFields = ['name', 'type', 'headline'];
    protected $requiredFields = [];

    /**
     * @param array $arr
     *
     * @return AbstractBaseFormType
     * @throws MissingFieldsException
     */
    public static function createFromArray(array $arr): self
    {
        $c = get_called_class();
        /** @var FormTypeInterface|self $s */
        $s = new $c();

        $diff = array_diff($s->getRequiredFields(), array_keys($arr));
        if (count($diff) > 0) {
            throw new MissingFieldsException($diff);
        }

        foreach ($arr as $key => $value) {
            if (property_exists($s, $key)) {
                $s->{$key} = $value;
            }
        }

        return $s;
    }

    public function getRequiredFields(): array
    {
        return array_merge($this->_requiredFields, $this->requiredFields);
    }
}