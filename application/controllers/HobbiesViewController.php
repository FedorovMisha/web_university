<?php

require 'application/controllers/BaseViewController.php';
require_once 'application/views/core/View.php';
require 'application/config/hobbies.php';

class HobbiesViewController extends ViewController {

    private $hobbies = [];

    function index() {

        for ($i=0; $i < 10; $i++) { 
            array_push($this->hobbies, createHobbie($i));
        }

        return new View($this->route, $this->hobbies);
    }
}