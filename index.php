<?php

require './application/core/router/router.php';
require './application/core/services/PhotoService.php';
require './application/core/Models/Blog.php';

session_start();


// Init router
$router = new Router;


// Observe query path
$router->observe();
