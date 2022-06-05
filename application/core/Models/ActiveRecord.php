<?php


class ActiveRecord {
    public static $pdo;

    protected static $tableName;
    
    public function __construct() {
        if(!static::$tableName) {
            return;
        }

        static::setupConnection();
    }

    public static function setupConnection() {
        if(!isset(static::$pdo)) {
            try {
                static::$pdo = new PDO("mysql:dbname=web; host=localhost;char-set=utf8", "root", "00000000");

            } catch (PDOException $ex) {
                die("Ошибка подключения");
            }
        }
    }

    public static function find($id) {
        $sql = "select * from ".static::$tableName." where id=$id";
        $stmt = static::$pdo->query($sql);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$row) {
            return false;
        }

        $ar_obj = new static();

        foreach($row as $key => $value) {
            $ar_obj->$key=$value;
        }

        return $ar_obj;
    }

    public static function findBy($name, $value) {
        $sql = "select * from ".static::$tableName." where ".$name." = '".$value."'";
        $stmt = static::$pdo->query($sql);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$row) {
            return false;
        }

        $ar_obj = new static();

        foreach($row as $key => $value) {
            $ar_obj->$key=$value;
        }

        return $ar_obj;
    }

    public function save() {}

    public static function findAll() {
        $sql = "select * from ".static::$tableName;
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

    public function delete() {
        $sql = "DELETE FROM ".static::$tableName." where id=".$this->id;
        $stmt = static::$pdo->query($sql);

        if($stmt) {
            return $stmt->fetch(PDO::FETCH__ASSOC);
        }
    }

    public static function getPage($page, $pageSize) {
        $offset = ($page - 1) * $pageSize;
        $sql = "SELECT * FROM ".static::$tableName." ORDER BY id DESC LIMIT $offset, $pageSize";
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

    public static function count() {
        $sql = "SELECT COUNT(*) FROM ".static::$tableName;
        $rows = static::$pdo->query($sql)->fetchColumn();
        return $rows;
    }
}