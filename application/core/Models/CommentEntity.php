<?php

class Comment {
    public $userName;
    public $email;
    public $date;
    public $text;

    public static function with_string($line) {
        $instance = new self();
        $data = explode(";", $line);
        $instance->userName = $data[0];
        $instance->email = $data[1];
        $instance->date = $data[2];
        $instance->text = $data[3];
        return $instance;
    }

    public static function with_data($userName, $email, $date, $text) {
        $instance = new self();
        $instance->userName = $userName;
        $instance->email = $email;
        $instance->date = $date;
        $instance->text = $text;
        return $instance;
    }
}