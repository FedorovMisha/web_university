<?php

class Photo {
    public $path;
    public $description;
    public $id;

    function __construct($path, $description, $id)
    {
        $this->path = $path;
        $this->description = $description;
        $this->id = $id;
    }
}