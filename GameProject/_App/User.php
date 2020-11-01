<?php


class User
{
    public $name;
    public $password;
    public $id;

    /**
     * User constructor.
     * @param $name
     * @param $password
     */
    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }
}