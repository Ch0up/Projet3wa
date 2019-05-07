<?php

namespace JKosacki;

class Validator
{
    private $data = [];
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }
    /*
    //
    //
    //
    //    POUR LA PARTIE REGISTER
    //
    //
    */
    public function getField($field)
    {
        if (!isset($this->data[$field])) {
            return null;
        }
        return $this->data[$field];
    }

    public function isAlpha($field, $errorMsg)
    {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $this->getField($field))) {
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isUniq($field, $db, $table, $errorMsg)
    {
        $record = $db->query("SELECT id FROM $table WHERE $field = ?", [$this->getField($field)])->fetch();
        if ($record) {
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isEmail($field, $errorMsg)
    {
        if (!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isConfirmed($field, $errorMsg = '')
    {
        if (empty($this->getField($field)) || $this->getField($field) != $this->getField($field . '_confirm')) {
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isValid()
    {
        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }


    /*
    //
    //
    //
    //    POUR LA PARTIE FORM CONTACT
    //
    //
    */
    public function check($name, $rule, $options = false)
    {
        $validator = "validate_$rule";
        if (!$this->$validator($name, $options)) {
            $this->errors[$name] = "Le champs $name n'a été rempli correctement";
        }
    }

    public function validate_required($name)
    {
        return array_key_exists($name, $this->data) && $this->data[$name] != '';
    }

    public function validate_email($name)
    {
        return array_key_exists($name, $this->data) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    }
}