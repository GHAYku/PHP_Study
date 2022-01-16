<?php

use Person as GlobalPerson;

class Person
{
    public $name;
    public $age;
    
    function __construct($name,$age)
    {
        $this->name = $name;
        $this->age = $age;
    }


    function hello() {
        echo 'hello, ' . $this->name;
    }
}

$bob = new Person('Bob',18);
$bob->hello();