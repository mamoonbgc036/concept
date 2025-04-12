<?php
class FormHandler
{
    private $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function getResponse()
    {
        return htmlspecialchars($this->input);
    }
}
