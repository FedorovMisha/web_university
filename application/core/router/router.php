<?php

class Router {
    protected $config = [];

    function observe() {
        if($this->match()) {
            $path = 'application/controllers/'.$this->config['controller'].'.php';
            if(!file_exists($path)){
                echo "404";
                return;
            }
            require_once $path;
            if (class_exists($this->config["controller"])) {
                $action = $this->config['action'];
                if (method_exists($this->config["controller"], $action)) {
                    $controller = new $this->config["controller"]($this->config);
                    $controller->$action()->render();
                }
            }
        } else {
            echo "404";
        }
    }

    private function match() {
        include 'application/config/routes.php';
        $path = trim($_SERVER['REQUEST_URI'], "/");
        foreach($routes as $route => $args) {
            if(strcmp($route, $path) == 0) {
                $this->config = $args;
                return true;
            }
        }
        return false;
    }
}