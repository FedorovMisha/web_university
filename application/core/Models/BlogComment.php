<?php

require_once 'application/core/Models/ActiveRecord.php';

class BlogComment extends ActiveRecord {

    public $id;
    public $text;
    public $userId;
    public $userEmail;
    public $userName;
    public $blogId;

    protected static $tableName = "comments";

    function __construct() {
        parent::__construct();
    }

    public static function init($text, $blogId, $userName, $userId, $userEmail) {
        $instance = new self();
        $instance->text = $text;
        $instance->userId = $userId;
        $instance->userEmail = $userEmail;
        $instance->userName = $userName;
        $instance->blogId = $blogId;
        return $instance;
    }

    function save() {
        $data = [
            'text' => $this->text,
            'userId' => $this->userId,
            'userName' => $this->userName,
            'blogId' => $this->blogId,
            'userEmail' => $this->userEmail,
        ];
        $sql = "INSERT INTO comments (text, userId, userName, blogId, userEmail) VALUES (:text, :userId, :userName, :blogId, :userEmail)";
        $stmt= static::$pdo->prepare($sql);
        $stmt->execute($data);
    }

    static public function getCommentsByBlogId($id) {
        $sql = "select * from ".static::$tableName." where blogId=$id";
        $stmt = static::$pdo->query($sql);

        $rows = $stmt->fetchAll();

        if(!$rows) {
            return null;
        }

        $array = array();

        foreach($rows as $row) {
            $ar_obj = new static();
            foreach($row as $key => $value) {
                $ar_obj->$key=$value;
            }
            array_push($array, $ar_obj);
        }

        return $array;
    }
}