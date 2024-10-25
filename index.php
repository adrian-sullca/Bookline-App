<?php

if (!isset($_SESSION)) {
    session_start();
}


require_once("./Config/config.php");
require_once("./Config/credentials.php");
require_once("./vendor/autoload.php");

use App\Router;

$myRouter = new Router();
$myRouter->run();