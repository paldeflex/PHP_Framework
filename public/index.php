<?php

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH.'/vendor/autoload.php';

use Framework\Http\Kernel;
use Framework\Http\Reqeust;

//dd(BASE_PATH);

$request = Reqeust::createFromGlobals();
$kernel = new Kernel();
$response = $kernel->handle($request);
$response->send();
