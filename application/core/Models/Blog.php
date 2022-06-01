<?php

require 'application/core/Models/ActiveRecord.php';

class Blog extends ActiveRecord {

    public $id;
    public $label;
    public $imagePath;
    public $description;

    protected static $tableName = "blog";

    function __construct() {
        parent::__construct();
    }

    public static function init($label, $imagePath, $description) {
        $instance = new self();
        $instance->label = $label;
        $instance->imagePath = $imagePath;
        $instance->description = $description;
        return $instance;
    }

    function save() {
        $data = [
            'label' => $this->label,
            'imagePath' => $this->imagePath,
            'description' => $this->description,
        ];
        print_r($data);
        $sql = "INSERT INTO blog (label, imagePath, description) VALUES (:label, :imagePath, :description)";
        $stmt= static::$pdo->prepare($sql);
        $stmt->execute($data);
    }
}