<?php

class Hobbie {
    public $name;
    public $description;
    public $imagePath;
    public $id;

    function __construct($name, $description, $imagePath, $id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->imagePath = $imagePath;
        $this->id = $id;
    }
}