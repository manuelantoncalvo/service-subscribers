<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait Validatable
{
    protected $rules = [];
    protected $errors = [];
    protected $messages = [];
    protected $validation;

    public function addError($attribute, $msg)
    {
        $this->errors[$attribute] = $msg;
        return $this->errors;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function getValidation()
    {
        return $this->validation;
    }

    public function isInvalid()
    {
        return !$this->isValid();
    }

    public function isValid()
    {
        return empty($this->errors);
    }

    public function validate()
    {
        $this->beforeValidation();
        $messages = $this->messages ? $this->messages : [];
        $this->validation = Validator::make($this->attributes, $this->rules, $messages);
        $this->errors = array_merge($this->errors, $this->getValidation()->errors()->messages());
        return $this;
    }

    public function beforeValidation() {}

    public function getMessage()
    {
        return $this->errors();
    }

    public function save(array $options = [])
    {
        $this->validate();
        if ($this->isValid()) {
            return parent::save($options);
        }
        return false;
    }
}