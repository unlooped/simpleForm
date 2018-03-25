<?php

namespace SimpleForm;

class ChoiceType extends AbstractBaseFormType
{

    public $typeName = 'choice';
    public $choices = [];
    public $multiple = false;
    public $placeholder = '';

    protected $requiredFields = ['choices'];

}