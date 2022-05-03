<?php

require 'application/views/core/View.php';

abstract class ViewController {

    public $route;

    function __construct($route)
    {
        $this->route = $route;
    }
}