<?php

require './application/core/router/router.php';
require './application/core/services/PhotoService.php';
require './application/core/Models/Blog.php';

session_start();
session_get_cookie_params();

// Init router
$router = new Router;


// Observe query path
$router->observe();
