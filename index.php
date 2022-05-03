<?php

require './application/core/router/router.php';
require './application/core/services/PhotoService.php';

session_start();


// Init router
$router = new Router;


// Observe query path
$router->observe();
