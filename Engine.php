<?php

class Engine
{
    /* @var $speed integer */
    public $speed;

    /* @var $power integer */
    public $power;

    public function __construct($speed, $power)
    {
        $this->speed = $speed;
        $this->power = $power;
    }
}