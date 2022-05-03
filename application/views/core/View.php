<?php

class View {
    protected $controller;
    protected $action;
    protected $layout = 'default';
    protected $args = NULL;

    function __construct($route, $args = NULL)
    {
        $this->controller = str_replace("Controller", "", $route["controller"]);
        $this->action = $route["action"];
        $this->folderPath = $_SERVER["DOCUMENT_ROOT"].'/application/views/';
        $this->args = $args;
    }

    function render() {
        ob_start();
        
        $args = $this->args;
        
        require $this->folderPath.$this->controller.'/'.$this->action.'.php';

        $body = ob_get_clean();

        ob_clean();

        require $_SERVER["DOCUMENT_ROOT"].'/application/layout/'.$this->layout.'.php';
    }
}