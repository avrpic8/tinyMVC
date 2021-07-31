<?php

session_start();

require_once('system/config.php');
require_once('system/bootstrap/Autoload.php');

use System\Bootstrap\Autoload;
use System\Router\Routing;

$autoload = new Autoload();
$autoload->autoloader();

$router = new Routing();
$router->run();