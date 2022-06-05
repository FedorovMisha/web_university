<?php

require_once 'application/core/Models/ActiveRecord.php';

class ApplicationUser extends ActiveRecord {

    public $id;
    public $email;
    public $password;
    public $name;

    protected static $tableName = "ApplicationUser";

    function __construct() {
        parent::__construct();
    }

    public static function init($email, $password, $name) {
        $instance = new self();
        $instance->email = $email;
        $instance->password = $password;
        $instance->name = $name;
        return $instance;
    }

    function save() {
        $data = [
            'email' => $this->email,
            'password' => $this->password,
            'name' => $this->name,
        ];
        print_r($data);
        $sql = "INSERT INTO ApplicationUser (email, password, name) VALUES (:email, :password, :name)";
        $stmt= static::$pdo->prepare($sql);
        $stmt->execute($data);
    }
}