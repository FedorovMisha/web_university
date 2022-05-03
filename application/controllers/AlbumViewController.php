<?php

require 'application/controllers/BaseViewController.php';
require_once 'application/views/core/View.php';
require_once 'application/core/services/PhotoService.php';

class AlbumViewController extends ViewController {

    private $service;

    function __construct($route)
    {
        parent::__construct($route);
        $this->service = new PhotoService;
    }

    function index() {
        return new View($this->route, $this->service->getPhotos());
    }
}