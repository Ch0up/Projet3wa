<?php

class Form
{
    private $data = [];

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    private function input($type, $name, $label)
    {
        $value = "";
        if (isset($this->data[$name])) {
            $value = $this->data[$name];
        }
        if ($type === 'textarea') {
            return "<textarea id=`\$name\ class=\"form-control\" required name=\"$name\" placeholder=\" * $label\" cols=\"20\" rows=\"5\">$value</textarea>";
        } else {
            return "<input id=\"$name\" class=\"form-control\" type=\"$type\" required name=\"$name\" placeholder=\"* $label\"
                   value=\"$value\">
            <label for=\"$name\"></label>";
        }
    }

    public function text($name, $label)
    {
        return $this->input('text', $name, $label);
    }

    public function email($name, $label)
    {
        return $this->input('email', $name, $label);
    }

    public function textarea($name, $label)
    {
        return $this->input('textarea', $name, $label);
    }
}