<?php

require 'application/controllers/BaseViewController.php';
require_once 'application/views/core/View.php';
require_once 'application/core/Validators/FormValidator.php';

class ContactViewController extends ViewController {

    private $validator;

    function __construct($route)
    {
        parent::__construct($route);
        $this->validator = new FormValidation;
    }

    function index() {
        return new View($this->route);
    }

    function send() {
        if(!empty($_POST)) {
            $this->validator->validate($_POST);
            if(!empty($this->validator->errors)) {
                return new View([
                    'controller' => 'ContactViewController',
                    'action' => "index"
                ], $this->validator->errors);
            }
        }

        return new View([
            'controller' => 'ContactViewController',
            'action' => "success"
        ]);
    }
}