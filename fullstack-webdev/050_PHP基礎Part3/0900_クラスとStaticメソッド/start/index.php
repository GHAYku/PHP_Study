<?php

use Person as GlobalPerson;

/**
 * クラス内のthis
 */
class Person
{
    private $name;
    public $age;
    public static $wheretolive = 'Earth';

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function hello() {
        echo 'hello, ' . $this->name;
        static::bye();
        return $this;
    }

    static function bye() {
        echo 'bye, ' ;
    }
}

$bob = new Person('Bob', 18);
$bob->hello();
echo Person::$wheretolive;


// $tim = new Person('Tim', 32);
// $tim->hello();