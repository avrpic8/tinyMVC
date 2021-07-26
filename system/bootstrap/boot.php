<?php

session_start();

use System\Bootstrap\AutoLoad;
use System\router\Routing;

$autoLoad = new AutoLoad();
$autoLoad->autoLoader();

$router = new Routing();
$router->run();