<?php

require 'application/views/core/View.php';
require_once 'application/core/Models/ApplicationUser.php';

// ripemd160
abstract class ViewController {

    public $route;

    function __construct($route)
    {
        $this->route = $route;
    }

    public function adminAuthenticate() {
        if(!empty($_POST["login"]) && !empty($_POST["password"])) {

            if ($_POST["login"] == "admin@gmail.com" && hash("ripemd160", $_POST["password"]) == hash("ripemd160", "admin")) {
                $_SESSION["login"] = "admin@gmail.com";
                $_SESSION["password"] = hash("ripemd160", "admin");
                $_SESSION["userId"] = "00000";
                $_SESSION["userName"] ="admin";
                return true;
            }
            return false;
        } 

        return false;
    }

    function authenticate() {
        ApplicationUser::setupConnection();
        $user = ApplicationUser::findBy("email", $_POST["login"]);
        if($user) {
            if ($user->password == hash("ripemd160", $_POST["password"])) {
                $_SESSION["login"] = $user->email;
                $_SESSION["password"] = $user->password;
                $_SESSION["userId"] = $user->id;
                $_SESSION["userName"] = $user->name;
                return true;
            }
        }
        return false;
    }

    function logout() {
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }

    function dropToLoginIfNotAdmin() {
        if(!empty($_SESSION["login"]) && !empty($_SESSION["password"])) {

            if ($_SESSION["login"] == "admin@gmail.com" && $_SESSION["password"] == hash("ripemd160", "admin")) {    
                return;
            }
        } 
        $this->logout();
        header("Location: /login");
        exit();
    }
}