<?php

require 'application/controllers/BaseViewController.php';
require_once 'application/views/core/AdminView.php';
require_once 'application/views/core/View.php';
require_once 'application/core/Models/ApplicationUser.php';

class ApplicationViewController extends ViewController {
    
    function login() {
        return new View($this->route);
    }

    function register() {
        return new View($this->route);
    }

    function postRegister() {
        if (!empty($_POST)) {
            $name = $_POST["name"];
            $email = $_POST["login"];
            $password = hash("ripemd160", $_POST["password"]);

            ApplicationUser::setupConnection();
            $user = ApplicationUser::findBy("email", $email);

            if(!$user) {
                $user = ApplicationUser::init($email, $password, $name);
                $user->save();
                header("Location: /login"); 
                exit();
            }

            echo "User is exist!";
        }
    }

    function postLogin() {
        if (parent::authenticate()) {
            header("Location: /"); 
            exit();
        }

        if (parent::adminAuthenticate()) {
            header("Location: /admin/blog"); 
            exit();
        }

        header("Location: /login"); 
        exit();
    }

    function logout() {
        parent::logout();
        header("Location: /"); 
        exit();
    }
}