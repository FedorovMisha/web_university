<?php

require 'application/core/Models/ActiveRecord.php';
require "application/core/Models/BlogComment.php";

class Blog extends ActiveRecord {

    public $id;
    public $label;
    public $imagePath;
    public $description;
    public $comments;

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
        $sql = "INSERT INTO blog (label, imagePath, description) VALUES (:label, :imagePath, :description)";
        $stmt= static::$pdo->prepare($sql);
        $stmt->execute($data);
    }

    function fetch() {
        BlogComment::setupConnection();

        $comments = BlogComment::getCommentsByBlogId($this->id);

        $this->comments = $comments;
    }

    function update() {
        Blog::setupConnection();
        $sql = 'UPDATE blog
                SET label = :label, description = :description
                WHERE id = :id';
        
        // prepare statement
        $statement = static::$pdo->prepare($sql);
        
        // bind params
        $statement->bindParam(':id', $this->id, PDO::PARAM_INT);
        $statement->bindParam(':label', $this->label);
        $statement->bindParam(':description', $this->description);
        echo $statement->execute();
    }
}