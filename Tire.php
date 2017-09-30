<?php

class Tire
{
    /* @var $pressure double */
    public $pressure;

    /* @var $age integer */
    public $age;

    public function __construct($pressure, $age)
    {
        $this->pressure = $pressure;
        $this->age      = $age;
    }
}