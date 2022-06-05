<?php

require_once 'application/core/Models/ActiveRecord.php';

class ViewStatistic extends ActiveRecord {

    public $id;
    public $date;
    public $webPage;
    public $ip;
    public $brouserName;
    public $hostName;

    protected static $tableName = "ViewStatistic";

    function __construct() {
        parent::__construct();
    }

    public static function init($date, $webPage, $ip, $brouserName, $hostName) {
        $instance = new self();
        $instance->date = $date;
        $instance->webPage = $webPage;
        $instance->ip = $ip;
        $instance->brouserName = $brouserName;
        $instance->hostName = $hostName;

        return $instance;
    }

    function save() {
        $data = [
            'date' => $this->date,
            'webPage' => $this->webPage,
            'ip' => $this->ip,
            'brouserName' => $this->brouserName,
            'hostName' => $this->hostName,
        ];
        $sql = "INSERT INTO ViewStatistic (date, webPage, ip, brouserName, hostName) VALUES (:date, :webPage, :ip, :brouserName, :hostName)";
        $stmt= static::$pdo->prepare($sql);
        $stmt->execute($data);
    }
}


function saveViewStatistic($page) {
    $ip = !empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: "is not set by client";
    $hostName = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $brouserName = $_SERVER['HTTP_USER_AGENT'];
    $date = date("d.m.y");
    $elem = ViewStatistic::init($date, $page, $ip, $brouserName, $hostName);
    $elem->save();
}