<?php

require 'application/controllers/BaseViewController.php';
require_once 'application/core/Models/CommentEntity.php';
require_once 'application/views/core/View.php';
require_once 'application/core/services/CommentService.php';

class GuestBookViewController extends ViewController {

    private $service;

    function __construct($route)
    {
        parent::__construct($route);
        $this->service = new CommentService();
    }
    
    function index() {
        return new View($this->route, $this->service->getAll());
    }

    // MARK: POST
    function addComment() {
        if(!empty($_POST)) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $date = date('d.m.y');
            $text = $_POST["commentText"];

            $comment = Comment::with_data($name, $email, $date, $text);

            $this->service->addComment($comment);
        }
        return new View([
            'controller' => 'GuestBookViewController',
            'action' => 'index'
        ], $this->service->getAll());
    }

    function admin() {

        return new View([
            'controller' => 'GuestBookViewController',
            'action' => 'admin'
        ]);
    }

    function uploadComments() {
        if(!empty($_FILES)) {
            $this->service->moveFile($_FILES["comments"]["tmp_name"]);
            echo "200 ok\n";
            return;
        }

        echo "Not uploaded";
    }
}