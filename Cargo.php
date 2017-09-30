<?php

class Cargo
{
    /* @var $weight integer */
    public $weight;

    /* @var $type string */
    public $type;

    public function __construct($weight, $type)
    {
        $this->weight = $weight;
        $this->type   = $type;
    }
}