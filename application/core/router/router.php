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
                    $action = $controller->$action();
                    if(isset($action)) {
                        $action->render();
                    }
                }
            }
        } else {
            echo "404-2";
        }
    }

    private function match() {
        include 'application/config/routes.php';
        $path = trim($_SERVER['REQUEST_URI'], "/");
        $pos = strpos($path, "?", 0 );
        $path = substr($path, 0, $pos > 0 ? $pos: strlen($path));
    
        foreach($routes as $route => $args) {
            if(strcmp($route, $path) == 0) {
                $this->config = $args;
                return true;
            }
        }

        echo $path;
        return false;
    }
}