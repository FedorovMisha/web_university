<?php

require 'application/controllers/BaseViewController.php';
require_once 'application/views/core/View.php';

class MainViewController extends ViewController {

    function index() {
        return new View($this->route);
    }
}