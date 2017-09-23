<?php

require __DIR__.'/../bootstrap/autoload.php';

$router = require_once __DIR__.'/../config/router.php';

session_start();


$router->run();

